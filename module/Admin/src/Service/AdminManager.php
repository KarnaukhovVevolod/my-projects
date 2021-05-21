<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service;
use Restaurant\Entity\AdminAuthentication;

use Zend\Crypt\Password\Bcrypt;
use Zend\Crypt;
use Zend\Math\Rand;
use Zend\Mail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;


/**
 * Description of AdminManager
 *
 * @author Seva
 */
class AdminManager {
    /**
     * Doctrine entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;  
    
    /**
     * PHP template renderer.
     * @var type 
     */
    private $viewRenderer;
    
    /**
     * Application config.
     * @var type 
     */
    private $config;
    
    /**
     * Constructs the service.
     */
    public function __construct($entityManager, $viewRenderer, $config) {
        $this->entityManager = $entityManager;
        $this->viewRenderer = $viewRenderer;
        $this->config = $config;
    }
    
    public function addAdmin($data){
        // Не допускаем создание нескольких пользователей с одинаковыми адресом эл. почты
        if($this->checkUserExists($data['email_admin'])){
            throw new Exception('Такой E-mail '.$data['email_admin'].' уже есть в базе данных. Введите новый E-mail.');
        }
        
        $admin = new AdminAuthentication();
        $admin->setEmail($email['email_admin']);
        $admin->setName($email['name_admin']);
        
        $bcrypt = new Bcrypt();
        $passwordHash = $bcrypt->create($data['password_admin']);
        $admin->setPassword($passwordHash);
        $admin->setPassw($data['password_admin']);
        $admin->setStatus($data['status_admin']);
        
        $currentDate = new \DateTime();
        $admin->setDateCreated($currentDate);
        
        $this->entityManager->persist($admin);
        $this->entityManager->flush();
        
        return $admin;
        
    }
    public function updateAdmin($admin, $data)
    {
        // Do not allow to change user email if another user with such email already exits.
        if($admin->getEmail()!=$data['email_admin'] && $this->checkUserExists($data['email_admin'])) {
            throw new \Exception("Another user with email address " . $data['email_admin'] . " already exists");
        }
        
        $admin->setEmail($data['email_admin']);
        $admin->setFullName($data['name_admin']);        
        $admin->setStatus($data['status_admin']);        
        
        // Apply changes to database.
        $this->entityManager->flush();

        return true;
        
    }

    public function createAdminUserIfNotExists()
    {
        $admin = $this->entityManager->getRepository(AdminAuthentication::class)->findOneBy([]);
        if( $admin == null){
            $date = new \DateTime();
            $admin = new AdminAuthentication();
            $admin->setEmail('karnaukhov333@gmail.com');
            $admin->setName('Admin');
            $bcrypt = new Bcrypt();
            $passwordHash = $bcrypt->create('Security_123');
            $admin->setPassword($passwordHash);
            $admin->setPassw('Security_123');
            $admin->setStatus(AdminAuthentication::STATUS_ACTIVE);
            $admin->setDateCreated($date);
            
            $this->entityManager->persist($admin);
            $this->entityManager->flush();
        }
    }
    
    /**
     * Checks whether an active user with given email address already exists in the database.     
     */
    public function checkUserExists($email) {
        
        $admin = $this->entityManager->getRepository(AdminAuthentication::class)
                ->findOneByEmail($email);
        
        return $admin !== null;
    }
    
    public function validatePassword($admin, $password)
    {
        $bcrypt = new Bcrypt();
        $passwordHash = $admin->getPassword();
        
        if( $bcrypt->verify($password, $passwordHash) ){
            return true;
        }
        return false;
    }
    
    /**
    * Генерирует для пользователя токен сброса пароля. Этот токен хранится в базе данных и 
    * отсылается на адрес эл. почты пользователя. Когда пользователь нажимает на ссылку в сообщении,
    * он направляется на страницу Set Password.
    */
    public function generatePasswordResetToken($admin)
    {
        if ($admin->getStatus() != AdminAuthentication::STATUS_ACTIVE) {
            throw new \Exception('Cannot generate password reset token for inactive user ' . $admin->getEmail());
        }

        // Generate a token.
        $token = Rand::getString(32, '0123456789abcdefghijklmnopqrstuvwxyz', true);

        // Encrypt the token before storing it in DB.
        $bcrypt = new Bcrypt();
        $tokenHash = $bcrypt->create($token);  

        // Save token to DB
        $admin->setPasswordResetToken($tokenHash);

        // Save token creation date to DB.
        $currentDate = date('Y-m-d H:i:s');
        $admin->setPasswordResetTokenCreationDate($currentDate);  

        // Apply changes to DB.
        $this->entityManager->flush();

        // Send an email to user.
        $subject = 'Password Reset';

        $httpHost = isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'localhost';
        $passwordResetUrl = 'http://' . $httpHost . '/set-password?token=' . $token . "&email=" . $admin->getEmail();

        // Produce HTML of password reset email
        $bodyHtml = $this->viewRenderer->render(
                'admin/email/reset-password-email',
                [
                    'passwordResetUrl' => $passwordResetUrl,
                ]);

        $html = new MimePart($bodyHtml);
        $html->type = "text/html";

        $body = new MimeMessage();
        $body->addPart($html);

        $mail = new Mail\Message();
        $mail->setEncoding('UTF-8');
        $mail->setBody($body);
        $mail->setFrom('no-reply@example.com', 'User Demo');
        $mail->addTo($admin->getEmail(), $admin->getName());
        $mail->setSubject($subject);

        // Setup SMTP transport
        $transport = new SmtpTransport();
        $options   = new SmtpOptions($this->config['smtp']);
        $transport->setOptions($options);

        $transport->send($mail);
    }
    
    /**
    * Проверяем, действителен ли токен сброса пароля.
    */
   public function validatePasswordResetToken($email, $passwordResetToken)
   {
       // Find user by email.
       $admin = $this->entityManager->getRepository(AdminAuthentication::class)
               ->findOneByEmail($email);

       if($admin == null || $admin->getStatus() != AdminAuthentication::STATUS_ACTIVE) {
           return false;
       }

       // Check that token hash matches the token hash in our DB.
       $bcrypt = new Bcrypt();
       $tokenHash = $admin->getPasswordResetToken();

       if (!$bcrypt->verify($passwordResetToken, $tokenHash)) {
           return false; // mismatch
       }

       // Check that token was created not too long ago.
       $tokenCreationDate = $admin->getPasswordResetTokenCreationDate();
       $tokenCreationDate = strtotime($tokenCreationDate);

       $currentDate = strtotime('now');

       if ($currentDate - $tokenCreationDate > 24*60*60) {
           return false; // expired
       }

       return true;
   }
   
   /**
    * Этот метод устанавливает новый пароль по токену сброса пароля.
    */
   public function setNewPasswordByToken($email, $passwordResetToken, $newPassword)
   {
       if (!$this->validatePasswordResetToken($email, $passwordResetToken)) {
          return false; 
       }

       // Find user with the given email.
       $admin = $this->entityManager->getRepository(AdminAuthentication::class)
               ->findOneByEmail($email);

       if ($admin==null || $admin->getStatus() != AdminAuthentication::STATUS_ACTIVE) {
           return false;
       }

       // Set new password for user        
       $bcrypt = new Bcrypt();
       $passwordHash = $bcrypt->create($newPassword);        
       $admin->setPassword($passwordHash);

       // Remove password reset token
       $admin->setPasswordResetToken(null);
       $admin->setPasswordResetTokenCreationDate(null);

       $this->entityManager->flush();

       return true;
   }

   /**
     * This method is used to change the password for the given user. To change the password,
     * one must know the old password.
     */
    public function changePassword($admin, $data)
    {
        $oldPassword = $data['old_password'];
        
        // Check that old password is correct
        if (!$this->validatePassword($admin, $oldPassword)) {
            return false;
        }                
        
        $newPassword = $data['new_password'];
        
        // Check password length
        if (strlen($newPassword)<6 || strlen($newPassword)>64) {
            return false;
        }
        
        // Set new password for user        
        $bcrypt = new Bcrypt();
        $passwordHash = $bcrypt->create($newPassword);
        $admin->setPassword($passwordHash);
        $admin->setPassw($newPassword);
        // Apply changes
        $this->entityManager->flush();

        return true;
    }
}
