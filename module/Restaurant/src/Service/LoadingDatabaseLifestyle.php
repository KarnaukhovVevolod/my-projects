<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service;

use Restaurant\Service\GetAuxiliaryData\CategoryFoodsEventRestaurantget;
use Restaurant\Entity\Photorestaurant;
use Restaurant\Service\GetAuxiliaryData\SortedKindsOfEventsRestaurantget;
use Restaurant\Service\GetAuxiliaryData\EventsInTheRestaurantget; 
use Restaurant\Service\GetAuxiliaryData\DateRestaurantget;
use Restaurant\Service\GetAuxiliaryData\PhotoFonAndSideMenu;

/**
 * Description of LoadingDatabaseLifestyle
 *
 * @author Seva
 */
class LoadingDatabaseLifestyle {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function setDataLifeStyle()
    {
        //записываем события (виды событий)
        $type_event_foods = new CategoryFoodsEventRestaurantget($this->entityManager);
        $dataTypeFoodsEvent_1 = ['Праздничные события',true,'/restaurant/public/index.php/restaurant/lifestyle&holiday_events'];
        $type_event_1 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_1);
        $dataTypeFoodsEvent_2 = ['Субботние события',true,'/restaurant/public/index.php/restaurant/lifestyle&saturday_events'];
        $type_event_2 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_2);
        $dataTypeFoodsEvent_3 = ['Другие события',true,'/restaurant/public/index.php/restaurant/lifestyle&other_events'];
        $type_event_3 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_3);
        
        //записываем в таблицу отсортированных событий
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(31);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(32);
        $photo_3 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(32);
        
        $SortedKindsEvent = new SortedKindsOfEventsRestaurantget($this->entityManager);
        $link_1 = 'holiday_events';
        $link_2 = 'saturday_events';
        $link_3 = 'other_events';
        $numberOfPosts = 3;
        
        $sortedKindsEvent_1 = $SortedKindsEvent->WriteInDatabase($photo_1, $type_event_1, $link_1, $numberOfPosts);
        $sortedKindsEvent_2 = $SortedKindsEvent->WriteInDatabase($photo_2, $type_event_2, $link_2, $numberOfPosts);
        $sortedKindsEvent_3 = $SortedKindsEvent->WriteInDatabase($photo_3, $type_event_3, $link_3, $numberOfPosts);
        
        //записываем дату 
        $date_1 = new \DateTime();
        $date_2 = new \DateTime();
        $date_3 = new \DateTime();
        $date_4 = new \DateTime();
        $date_5 = new \DateTime();
        $date_6 = new \DateTime();
        $date_7 = new \DateTime();
        $date_8 = new \DateTime();
        $date_9 = new \DateTime();
        $date_1->setDate(2021, 6, 25);
        $date_2->setDate(2021, 7, 25);
        $date_3->setDate(2021, 8, 24);
        
        $date_4->setDate(2021, 5, 25);
        $date_5->setDate(2021, 5, 20);
        $date_6->setDate(2021, 9, 24);
        $date_7->setDate(2021, 6, 2);
        $date_8->setDate(2021, 5, 5);
        $date_9->setDate(2021, 6, 12);
        
        //die();
        $Daterest = new DateRestaurantget($this->entityManager);
        
        $class_date_1 = $Daterest->WriteInDatabase($date_1);
        $class_date_2 = $Daterest->WriteInDatabase($date_2);
        $class_date_3 = $Daterest->WriteInDatabase($date_3);
        
        $class_date_4 = $Daterest->WriteInDatabase($date_4);
        $class_date_5 = $Daterest->WriteInDatabase($date_5);
        $class_date_6 = $Daterest->WriteInDatabase($date_6);
        $class_date_7 = $Daterest->WriteInDatabase($date_7);
        $class_date_8 = $Daterest->WriteInDatabase($date_8);
        $class_date_9 = $Daterest->WriteInDatabase($date_9);
        
        //записываем в таблицу событий(главная)
        $main_events_in_the_restaurant = new EventsInTheRestaurantget($this->entityManager);
        
        $event_name_1 = 'Отмечаем 8 Марта в ресторане'; 
        $brief_description_1 = 'В день 8 Марта в нашем ресторане будут проходить большие скидки, на большое ассортимент праздничных блюд.'; 
        $link_to_event_1 = '/restaurant/public/index.php/restaurant/single&id=1'; 
        $the_popularity_1 = 2;
                
        $main_events_1 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_1, $sortedKindsEvent_1, 
                        $class_date_1,$event_name_1, 
                        $brief_description_1, $link_to_event_1, 
                        $the_popularity_1);
        
        $event_name_2 = 'События в Субботу';
        $brief_description_2 = 'Каждую субботу в нашем проходят скидки на комплексные обеды, а также проходят открытые караоке.';
        $link_to_event_2 = '/restaurant/public/index.php/restaurant/single&id=2';
        $the_popularity_2 = 3;
        
        $main_events_2 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_2, $sortedKindsEvent_2, 
                        $class_date_2, $event_name_2, 
                        $brief_description_2, $link_to_event_2, 
                        $the_popularity_2);
        
        $event_name_3 = 'День ресторана';
        $brief_description_3 = 'В этот день ресторан был открыт и каждый год отмечает свой День Рождения. В этот день на все блюда скидка 50%.';
        $link_to_event_3 = '/restaurant/public/index.php/restaurant/single&id=3';
        $the_popularity_3 = 3;
        
        $main_events_3 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_3, $sortedKindsEvent_3, 
                        $class_date_3, $event_name_3, 
                        $brief_description_3, $link_to_event_3, 
                        $the_popularity_3);
        
        
        $event_name_4 = 'Отмечаем 23 февраля в ресторане'; 
        $brief_description_4 = 'В день 23 Февраля в нашем ресторане будут проходить скидки на праздничные обеды.'; 
        $link_to_event_4 = '/restaurant/public/index.php/restaurant/single&id=4'; 
        $the_popularity_4 = 4;
                
        $main_events_4 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_1, $sortedKindsEvent_1, 
                        $class_date_4,$event_name_4, 
                        $brief_description_4, $link_to_event_4, 
                        $the_popularity_4);
        
        $event_name_5 = 'События в Субботу вечером';
        $brief_description_5 = 'Каждую субботу в нашем проходят скидки на комплексные обеды, а также проходят открытые караоке.';
        $link_to_event_5 = '/restaurant/public/index.php/restaurant/single&id=5';
        $the_popularity_5 = 3;
        
        $main_events_5 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_2, $sortedKindsEvent_2, 
                        $class_date_5, $event_name_5, 
                        $brief_description_5, $link_to_event_5, 
                        $the_popularity_5);
        
        $event_name_6 = 'День города';
        $brief_description_6 = 'В рестаране будет проходить акция !!! 50% скидка на все блюда.';
        $link_to_event_6 = '/restaurant/public/index.php/restaurant/single&id=6';
        $the_popularity_6 = 3;
        
        $main_events_6 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_3, $sortedKindsEvent_3, 
                        $class_date_6, $event_name_6, 
                        $brief_description_6, $link_to_event_6, 
                        $the_popularity_6);
        
        
        $event_name_7 = 'День народного единства'; 
        $brief_description_7 = 'В нашем ресторане будет проходить концерт со специальным гостем. Приходите скучно не будет.'; 
        $link_to_event_7 = '/restaurant/public/index.php/restaurant/single&id=7'; 
        $the_popularity_7 = 7;
                
        $main_events_7 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_1, $sortedKindsEvent_1, 
                        $class_date_7,$event_name_7, 
                        $brief_description_7, $link_to_event_7, 
                        $the_popularity_7);
        
        $event_name_8 = 'Музыкальное шоу';
        $brief_description_8 = 'Наш ресторан посетит группа классической музыки: фортепьяно, рояль скрипка и многое другое .';
        $link_to_event_8 = '/restaurant/public/index.php/restaurant/single&id=8';
        $the_popularity_8 = 3;
        
        $main_events_8 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_2, $sortedKindsEvent_2, 
                        $class_date_8, $event_name_8, 
                        $brief_description_8, $link_to_event_8, 
                        $the_popularity_8);
        
        $event_name_9 = 'Открытое караоке';
        $brief_description_9 = 'В этот день у нас будет специальный гость, вместе с котором можно будет спеть.';
        $link_to_event_9 = '/restaurant/public/index.php/restaurant/single&id=9';
        $the_popularity_9 = 3;
        
        $main_events_9 = $main_events_in_the_restaurant
                ->WriteInDatabase($photo_3, $sortedKindsEvent_3, 
                        $class_date_9, $event_name_9, 
                        $brief_description_9, $link_to_event_9, 
                        $the_popularity_9);
        
        
        debug('всё записано');
        die();
        
    }
    
    public function writeFonAndSideMenu()
    {
        $writeFonAndSidemenu = new PhotoFonAndSideMenu($this->entityManager);
        $writeFonAndSidemenu->writePhotoFon();
        $writeFonAndSidemenu->writeSideMenu();
        debug('данные в боковое меню записаны');
        die();
    }
    
}
