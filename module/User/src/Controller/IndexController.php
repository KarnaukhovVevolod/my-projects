<?php


namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Entity\User;


class IndexController extends AbstractActionController
{
    
    /**
     * @var Doctrine\ORM\EntityManager
    */
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }


    //put your code here
    public function indexAction()
    {
        $user = new User();
        $user->setNameUser("Seva Karnaukhov");
        $user->setEmail("karnaukhov333@gmail.com");
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return new ViewModel();
    }
    
    
}


