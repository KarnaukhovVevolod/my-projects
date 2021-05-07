<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service;

use Restaurant\Entity\Photorestaurant;
use Restaurant\Entity\Videorestaurant;
use Restaurant\Entity\TableAboutUsRestaurant;
use Doctrine\ORM\Query\ResultSetMapping;
/**
 * Description of LoadingDatabaseManager
 *
 * @author Seva
 */
class LoadingDatabaseManager {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function setDataPhoto()
    {
        //$photo = new Photorestaurant();
        //$photo->setPhoto('images/bg_4.jpg');
        
        //Добавляем сущность в менеджер сущностей 
        //$this->entityManager->persist($photo);
        
        //Применяем изменения к базе данных
        //$this->entityManager->flush();
        
        
        /*Удаляем изменения в базе данных*/
        //$employee_createQuery = $this->entityManager
        //        ->createQuery("delete from Restaurant\Entity\Photorestaurant m where m.id=14")
        //        ->execute();
        
        
         /* Обновляем изменения в базе данных  работает */
        //$employee_createQuery = $this->entityManager
        //        ->createQuery("update Restaurant\Entity\Photorestaurant m set m.photo = 'images/about.jpg' where m.id=14")
        //        ->execute();
        
        /* Записываем в базу данных новые значения без привязки к классу сущности */
        //$employee_createQuery = $this->entityManager
        //        ->getConnection() //доступ к собственному соединению с базой данных
        //        ->executeUpdate("insert into photorestaurant (photo) values('images/about.jpg')");
        
        /* Удаляем данные из базы данных  без привязки к классу сущности */
        //$this->entityManager
        //        ->getConnection()
        //        ->executeUpdate("delete from photorestaurant where id=15");
        
        /*
        $this->entityManager
                ->getConnection() //доступ к собственному соединению с базой данных
                ->executeUpdate("insert into photorestaurant (photo) values('images/bg_4.jpg')");
        */
        /*
        debug('Записали фото');
        
        //$dir = '../../../../public/images';
        $dir = '/xampp/htdocs/restaurant/public/images';
        $files = scandir($dir);
        $count_file = count($files);
        $path_photo;$j=0;
        for( $i = 4; $i < $count_file; $i++)
        {
            if($files[$i] != 'bg_4.jpg')
            {
                $path_photo[$j] = 'images/'.$files[$i];
                $j++;
            }
        }
        foreach($path_photo as $path)
        {
            $photo = new Photorestaurant();
            $photo->setPhoto($path);
            $this->entityManager->persist($photo);
        }
        $this->entityManager->flush();
        
        debug($files);
        debug($path_photo);
        
        die();
         * *
         */
        
        
        /*
        $dir = '/xampp/htdocs/restaurant/public/photo foods';
        $files = scandir($dir);
        //debug($files);die();
        $count_file = count($files);
        $path_photo;$j = 0;
        for( $i = 2; $i < $count_file; $i++)
        {
            if($files[$i] != 'bg_4.jpg')
            {
                $path_photo[$j] = 'images/'.$files[$i];
                $j++;
            }
        }
        foreach($path_photo as $path)
        {
            $photo = new Photorestaurant();
            $photo->setPhoto($path);
            $this->entityManager->persist($photo);
        }
        $this->entityManager->flush();
        
        debug($files);
        debug($path_photo);
        
        die();
         * 
         */
    }
    
    public function setDataPhotoSingleEvent(){
        //$dir = '../../../../public/images';
        $dir = '/xampp/htdocs/restaurant/public/photo event';
        $files = scandir($dir);
        //debug($files);
        //die();
        $count_file = count($files);
        $path_photo;$j=0;
        for( $i = 2; $i < $count_file; $i++)
        {    
            $path_photo[$j] = 'images/'.$files[$i];
            $j++;            
        }
        foreach($path_photo as $path)
        {
            $photo = new Photorestaurant();
            $photo->setPhoto($path);
            $this->entityManager->persist($photo);
        }
        $this->entityManager->flush();
        debug('photo write basedata');
        die();
    }
    
    public function setDataAboutUs()
    {
        $table_about_us = new TableAboutUsRestaurant();
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)->find(20);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)->find(16);
        $photo_3 = $this->entityManager->getRepository(Photorestaurant::class)->find(14);
        //debug($photo_1);
        //die();
        
        $table_about_us->setHeadAndTextHistory('О НАС', 'В нашем ресторане имеется большой выбор различных блюд. '
                . 'Наш ресторан ежедневно посещяют десятки постоянных клиентов. Также у нас довольно часто происходят праздничные события и скидки на большой выбор блюд. ')
                ->setAllTitle('Лет на рынке', 'Блюд', 'Cобытия', 'Постоянные клиенты')
                ->setAllNumber(10, 40, 20, 50)
                ->setALLHuman('Василий Корпенко', 'Друзья Добрый день! Меня зовут Василий я профессиональный дизайнер. Работал в Париже, Праге, Лондоне. Делал класные разработки для различных ресторанов и вот надеюсь, что дизайн этого ресторана вам понравится. Добро пожаловать!',$photo_1)
                ->setDifferentData($photo_2, null,$photo_3);
        //$data =  debug($table_about_us);die();
        //Добавляем сущность в менеджер сущностей 
        $this->entityManager->persist($table_about_us);
        
        //Применяем изменения к базе данных
        $this->entityManager->flush();
    }
    
    public function getAboutUsData(){
        /*
        $table_about_us = $this->entityManager->getRepository(TableAboutUsRestaurant::class)->find(1);
        $te = $table_about_us->getAllData();
        $te1 = $table_about_us->getId();
        
        debug($te1);
        $te2 = $table_about_us->getPhotoHuman();
        $te3 = $te2->getAllData();
        debug($te3);
        debug($te['id']);
        debug($te['headHistory']);
        $data_about_us['id'] = $te['id'];
        $data_about_us['headHistory'] = $te['headHistory'];
        $data_about_us['textHistory'] = $te['textHistory'];
        $data_about_us['number1'] = $te['number1'];
        $data_about_us['title1'] = $te['title1'];
        $data_about_us['number2'] = $te['number2'];
        $data_about_us['title2'] = $te['title2'];
        $data_about_us['number3'] = $te['number3'];
        $data_about_us['title3'] = $te['title3'];
        $data_about_us['number4'] = $te['number4'];
        $data_about_us['title4'] = $te['title4'];
        $data_about_us['nameHuman'] = $te['nameHuman'];
        $data_about_us['textHuman'] = $te['textHuman'];
        $data_about_us['photoHead'] = $te['photoHead']->getAllData();
        $data_about_us['photoHuman'] = $te['photoHuman']->getAllData();
        if($te['video'] != null)
            $data_about_us['video'] = $te['video']->getAllData();
        else
            $data_about_us['video'] = $te['video'];
        $data_about_us['photoAbout'] = $te['photoAbout']->getAllData();
        debug($data_about_us);
        /**/
        /*
        debug('Другой способ считывания');
        
        $data_about_us_new = $this->entityManager
                ->createQueryBuilder()
                ->select('p')
                ->from(TableAboutUsRestaurant::class,'p')
                ->leftJoin('p')
                //->join('p.photoHead','photoHead')
                //->join('p.photoHuman','photoHuman')
                //->join('p.photoAbout','photoAbout')
                //->join('p.video','video')
                ->orderBy('p.id', 'DESC')
                ->setMaxResults(1);
        $data_about_us_new1 = $data_about_us_new->getQuery()->getResult();
        
        $de = $data_about_us_new1[0]->getAllData();
        $de['photoHuman'] = $de['photoHuman']->getAllData();
        $de['photoHead'] = $de['photoHead']->getAllData();
        $de['photoAbout'] = $de['photoAbout']->getAllData();
        if( $de['video'] != null )
            $de['video'] = $de['video']->getAllData();
        debug($de);
         
         */
         /* *
          * 
         */
        
        /*
        debug('третий способ считывания'); 
        $employee_createQuery = $this->entityManager
                ->createQuery("Select tb From Restaurant\Entity\TableAboutUsRestaurant tb ")
                ->execute();
        $employee_createQuery = $employee_createQuery[0]->getAllData(); 
        $employee_createQuery['photoHuman'] = $employee_createQuery['photoHuman']->getAllData();
        $employee_createQuery['photoHead'] = $employee_createQuery['photoHead']->getAllData();
        $employee_createQuery['photoAbout'] = $employee_createQuery['photoAbout']->getAllData();
        
        debug($employee_createQuery);
        */
        /*NativeQuery*/
        /*
        debug('четвёртый способ считывания');
        $rsm = new ResultSetMapping();
        
        $rsm->addEntityResult(TableAboutUsRestaurant::class, 't');
        $rsm->addFieldResult('t', 'id', 'id');
        $rsm->addFieldResult('t', 'head_history', 'headHistory');
        $rsm->addFieldResult('t', 'text_history', 'textHistory');
        $rsm->addFieldResult('t', 'number_1', 'number1');
        $rsm->addFieldResult('t', 'title_1', 'title1');
        $rsm->addFieldResult('t', 'number_2', 'number2');
        $rsm->addFieldResult('t', 'title_2', 'title2');
        $rsm->addFieldResult('t', 'number_3', 'number3');
        $rsm->addFieldResult('t', 'title_3', 'title3');
        $rsm->addFieldResult('t', 'number_4', 'number4');
        $rsm->addFieldResult('t', 'title_4', 'title4');
        $rsm->addFieldResult('t', 'name_human', 'nameHuman');
        $rsm->addFieldResult('t', 'text_human', 'textHuman');
        //$rsm->addFieldResult('t', 'photo_head_id', 'photoHead');
        $rsm->addJoinedEntityResult(Photorestaurant::class, 'ph', 't', 'photoHead');
        //$rsm->addMetaResult('ph', 'photo','photo');
        //$rsm->addFieldResult('ph', 'id', 'id');
        $rsm->addFieldResult('ph', 'photo', 'photo');
        $dataBase = $this->entityManager
               
                ->createNativeQuery("SELECT * FROM table_about_us_restaurant t "
                        . "LEFT JOIN photorestaurant ph ON t.photo_head_id = ph.id",$rsm)
                ->getResult();
        
        debug($dataBase);
        */
        
        
        debug('Другой способ считывания');
        $ty = null;
        $data_about_us_new = $this->entityManager
                ->createQueryBuilder()
                ->select("IDENTITY(t.photoHead) AS photoHead ",'IDENTITY(t.photoHuman) AS photoHuman','IDENTITY(t.photoAbout) AS photoAbout','IDENTITY(t.video) AS video','t')
                ->addSelect('phe','phu','pha', 'vid')
                ->from(TableAboutUsRestaurant::class,'t')
                ->leftjoin('t.photoHead','phe')
                ->leftjoin('t.photoHuman','phu')
                ->leftjoin('t.photoAbout','pha')
                ->leftjoin('t.video','vid')
                ->orderBy('t.id', 'DESC');
                //->setMaxResults(3);
        $data_about_us_new1 = $data_about_us_new->getQuery()->getArrayResult();
        
        debug($data_about_us_new1);
        //die();
        //debug($data_about_us_new1[0]['photoHead']);
        //$lk = $data_about_us_new1[0]->getAllData();
        //debug($lk['photoHead']->getAllData());
        //debug($lk['photoHuman']->getAllData());
        //die();
        /*
        $de = $data_about_us_new1[0]->getAllData();
        $de['photoHuman'] = $de['photoHuman']->getAllData();
        //$de['photoHead'] = $de['photoHead']->getAllData();
        $de['photoAbout'] = $de['photoAbout']->getAllData();
        if( $de['video'] != null )
            $de['video'] = $de['video']->getAllData();
        debug($de);
         */
        //die();
        
    }
    
}
