<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\TableSideMenuRestaurant;
use Restaurant\Entity\Photorestaurant;


/**
 * Description of PhotoFonAndSideMenu
 *
 * @author Seva
 */
class PhotoFonAndSideMenu {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    //для странички события
    public function writePhotoFon()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('16');
        $photoFon = new PhotoFonRestaurant();
        $photoFon->setPage(1)
                ->setPhoto($photo);
        $this->entityManager->persist($photoFon);
        $this->entityManager->flush();
    }
    
    public function writeSideMenu()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('17');
        
        $sideMenu = new TableSideMenuRestaurant();
        $textMenu = '<p>Привет! Меня зовут  <strong>Елена Грэй</strong>. '
                . 'Я профессионал в организации праздников, различных событий, мероприятий.  '
                . 'Я со своей командой дизайнеров могу превратить любой ресторан, в уютное и необычное место,'
                . ' которое очень удивит посетителей, а необычное звуковое сопровождение заставит вас думать, что вы находитесь '
                . ' на необычном высокопоставленном приёме в какой-нибудь одной из самых красивых стран мира.'
                ;
        $sideMenu->setHead('Обо Мне')
                ->setPage(1)
                ->setPhoto($photo)
                ->setTextMenu($textMenu);
        $this->entityManager->persist($sideMenu);
        $this->entityManager->flush();
    }
    
    public function writePhotoFonIndex()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('17');
        
        $sideMenu = new TableSideMenuRestaurant();
        $textMenu = '<p>Привет! Меня зовут  <strong>Елена Грэй</strong>. '
                . 'Я генеральный директор рестрана этого ресторана. Я собрала очень класную '
                . 'команду, которая помогает сделать ресторан очень уютным местом, где можно вкусно поесть, '
                . 'а также интересно отдохнуть на различных мероприятиях, которых проходят в ресторане. '
                . '<br> В общем <br> Друзья </br> приходите, надеюсь вам понравиться у нас. Всего вам хорошего и удачного дня!'
                ;
        $sideMenu->setHead('Обо Мне')
                ->setPage(3)
                ->setPhoto($photo)
                ->setTextMenu($textMenu);
        $this->entityManager->persist($sideMenu);
        $this->entityManager->flush();
    }
    //для странички еда
    public function writePhotoFonFoods()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('16');
        $photoFon = new PhotoFonRestaurant();
        $photoFon->setPage(2)
                ->setPhoto($photo);
        $this->entityManager->persist($photoFon);
        $this->entityManager->flush();
    }
    
    //для single foods
    public function writePhotoFonSingleFood()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('16');
        $photoFon = new PhotoFonRestaurant();
        $photoFon->setPage(4)
                ->setPhoto($photo);
        $this->entityManager->persist($photoFon);
        $this->entityManager->flush();
    }
    //для single foods
    public function writePhotoFonSingleEvents()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('16');
        $photoFon = new PhotoFonRestaurant();
        $photoFon->setPage(5)
                ->setPhoto($photo);
        $this->entityManager->persist($photoFon);
        $this->entityManager->flush();
    }
    
    public function writeSideMenuFoods()
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)
                ->find('17');
        
        
        $sideMenu = new TableSideMenuRestaurant();
        $textMenu = '<p>Привет! Меня зовут  <strong>Елена Иванова</strong>. '
                . 'Я профессиональный повар работал в ресторанах Италии, Франции.  '
                . 'В своих блюдах я стараюсь эксепериментировать с разными ингредиентами,  '
                . ' создавая новое блюдо с необычным вкусом. '
                . ' Так же я нормально отношусь к критике мох блюд и готова их изменить, если что-то не понравилось.'
                ;
        $sideMenu->setHead('Обо Мне')
                ->setPage(2)
                ->setPhoto($photo)
                ->setTextMenu($textMenu);
        $this->entityManager->persist($sideMenu);
        $this->entityManager->flush();
    }
    
    
    
}
