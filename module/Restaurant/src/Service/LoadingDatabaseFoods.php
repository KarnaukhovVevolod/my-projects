<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service;

use Restaurant\Service\GetAuxiliaryData\CategoryFoodsEventRestaurantget;
use Restaurant\Service\GetAuxiliaryData\PhotoFonAndSideMenu;
use Restaurant\Service\GetAuxiliaryData\SortedKindsOfDishRestaurantget;
use Restaurant\Service\GetAuxiliaryData\DishInTheRestaurantget;

use Restaurant\Entity\Photorestaurant;



/**
 * Description of LoadingDatabaseFoods
 *
 * @author Seva
 */
class LoadingDatabaseFoods {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function setDataDish()
    {
        //записываем события (виды событий)
        $type_event_foods = new CategoryFoodsEventRestaurantget($this->entityManager);
        $dataTypeFoodsEvent_1 = ['Первые блюда',false,'/restaurant/public/index.php/restaurant/foods/foods0/first_course'];
        $type_foods_1 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_1);
        $dataTypeFoodsEvent_2 = ['Вторые блюда',false,'/restaurant/public/index.php/restaurant/foods/foods0/second_course'];
        $type_foods_2 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_2);
        $dataTypeFoodsEvent_3 = ['Салаты',false,'/restaurant/public/index.php/restaurant/foods/foods0/salads'];
        $type_foods_3 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_3);
        $dataTypeFoodsEvent_4 = ['Напитки',false,'/restaurant/public/index.php/restaurant/foods/foods0/beverages'];
        $type_foods_4 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_4);
        $dataTypeFoodsEvent_5 = ['Десерты',false,'/restaurant/public/index.php/restaurant/foods/foods0/desserts'];
        $type_foods_5 = $type_event_foods->WriteInDatabase($dataTypeFoodsEvent_5);
        //die();
        //записываем в таблицу отсортированных событий
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(26);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(27);
        $photo_3 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(29);
        $photo_4 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(25);
        $photo_5 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(24);
        $SortedKindsDish = new SortedKindsOfDishRestaurantget($this->entityManager);
        $link_1 = 'first_course';
        $link_2 = 'second_course';
        $link_3 = 'salads';
        $link_4 = 'beverages';
        $link_5 = 'desserts';
        
        $numberOfVarietiesDish_1 = 5;
        $numberOfVarietiesDish_2 = 11;
        $numberOfVarietiesDish_3 = 8;
        $numberOfVarietiesDish_4 = 13;
        $numberOfVarietiesDish_5 = 7;
        
        $sortedKindsDish_1 = $SortedKindsDish->WriteInDatabase($photo_1, $type_foods_1, $link_1, $numberOfVarietiesDish_1);
        $sortedKindsDish_2 = $SortedKindsDish->WriteInDatabase($photo_2, $type_foods_2, $link_2, $numberOfVarietiesDish_2);
        $sortedKindsDish_3 = $SortedKindsDish->WriteInDatabase($photo_3, $type_foods_3, $link_3, $numberOfVarietiesDish_3);
        $sortedKindsDish_4 = $SortedKindsDish->WriteInDatabase($photo_4, $type_foods_4, $link_4, $numberOfVarietiesDish_4);
        $sortedKindsDish_5 = $SortedKindsDish->WriteInDatabase($photo_5, $type_foods_5, $link_5, $numberOfVarietiesDish_5);
        
        //записываем в таблицу еды(главная)
        $main_foods_in_the_restaurant = new DishInTheRestaurantget($this->entityManager);
        
        //первая запись первые блюда
        $typeDish_1 = $sortedKindsDish_1;
        
        $dishName_1 = 'Картофельный суп с курицей';
        $linkToDish_1 = '/restaurant/public/index.php/restaurant/single/i1/foods';
        $priceDish_1 = '120 р';
        $thePopularityOfTheDish_1 = 10;
        $recipe_1 = false;
        $photoForDish_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(84);
        
        $main_foods_1 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_1, $linkToDish_1, $priceDish_1, $thePopularityOfTheDish_1,
                        $recipe_1, $photoForDish_1,$typeDish_1);
        //
        $dishName_2 = 'Борщь классический';
        
        $photoForDish_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(85);
        $linkToDish_2 = '/restaurant/public/index.php/restaurant/single/i2/foods';
        $priceDish_2 = '100 р';
        $thePopularityOfTheDish_2 = 12;
        $recipe_2 = true;
        $main_foods_2 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_2, $linkToDish_2, $priceDish_2, $thePopularityOfTheDish_2,
                        $recipe_2, $photoForDish_2,$typeDish_1);
        
        $dishName_3 = 'Окрошка с калбосой';
        $photoForDish_3 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(86);
        $linkToDish_3 = '/restaurant/public/index.php/restaurant/single/i3/foods';
        $priceDish_3 = '90 р';
        $thePopularityOfTheDish_3 = 5;
        $recipe_3 = true;
        $main_foods_3 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_3, $linkToDish_3, $priceDish_3, $thePopularityOfTheDish_3,
                        $recipe_3, $photoForDish_3,$typeDish_1);
        
        $dishName_4 = 'Рассольник';
        
        $photoForDish_4 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(87);
        $linkToDish_4 = '/restaurant/public/index.php/restaurant/single/i4/foods';
        $priceDish_4 = '110 р';
        $thePopularityOfTheDish_4 = 9;
        $recipe_4 = true;
        $main_foods_4 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_4, $linkToDish_4, $priceDish_4, $thePopularityOfTheDish_4,
                        $recipe_4, $photoForDish_4,$typeDish_1);
        
        $dishName_5 = 'Грибной суп-пюре';
        
        $photoForDish_5 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(88);
        $linkToDish_5 = '/restaurant/public/index.php/restaurant/single/i5/foods';
        $priceDish_5 = '130 р';
        $thePopularityOfTheDish_5 = 12;
        $recipe_5 = false;
        $main_foods_5 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_5, $linkToDish_5, $priceDish_5, $thePopularityOfTheDish_5,
                        $recipe_5, $photoForDish_5, $typeDish_1);
        
        //вторые блюда
        $dishName_6 = 'Каша молочная';
        $photoForDish_6 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(74);
        $linkToDish_6 = '/restaurant/public/index.php/restaurant/single/i6/foods';
        $priceDish_6 = '80 р';
        $thePopularityOfTheDish_6 = 2;
        $recipe_6 = false;
        $typeDish_2 = $sortedKindsDish_2;
        $main_foods_6 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_6, $linkToDish_6, $priceDish_6, $thePopularityOfTheDish_6,
                        $recipe_6, $photoForDish_6, $typeDish_2);
        
        $dishName_7 = 'Жаркое по деревенски';
        $linkToDish_7 = '/restaurant/public/index.php/restaurant/single/i7/foods';
        $priceDish_7 = '160 р';
        $thePopularityOfTheDish_7 = 15;
        $recipe_7 = true;
        $photoForDish_7 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(77);
        $main_foods_7 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_7, $linkToDish_7, $priceDish_7, $thePopularityOfTheDish_7,
                        $recipe_7, $photoForDish_7, $typeDish_2);
        
        $dishName_8 = 'Паста карбонадо';
        $linkToDish_8 = '/restaurant/public/index.php/restaurant/single/i8/foods';
        $priceDish_8 = '180 р';
        $thePopularityOfTheDish_8 = 17;
        $recipe_8 = true;
        $photoForDish_8 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(78);
        $main_foods_8 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_8, $linkToDish_8, $priceDish_8, $thePopularityOfTheDish_8,
                        $recipe_8, $photoForDish_8,$typeDish_2);
        
        $dishName_9 = 'Запечённое мясо в картофельной шубе';
        $linkToDish_9 = '/restaurant/public/index.php/restaurant/single/i9/foods';
        $priceDish_9 = '110 р';
        $thePopularityOfTheDish_9 = 13;
        $recipe_9 = false;
        $photoForDish_9 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(79);
        $main_foods_9 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_9, $linkToDish_9, $priceDish_9, $thePopularityOfTheDish_9,
                        $recipe_9, $photoForDish_9,$typeDish_2);
        
        $dishName_10 = 'Блины с ветчиной и сыром';
        $linkToDish_10 = '/restaurant/public/index.php/restaurant/single/i10/foods';
        $priceDish_10 = '150 р';
        $thePopularityOfTheDish_10 = 6;
        $recipe_10 = false;
        $photoForDish_10 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(73);
        $main_foods_10 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_10, $linkToDish_10, $priceDish_10, $thePopularityOfTheDish_10,
                        $recipe_10, $photoForDish_10,$typeDish_2);
        
        $dishName_11 = 'Шашлык из свинины';
        $linkToDish_11 = '/restaurant/public/index.php/restaurant/single/i11/foods';
        $priceDish_11 = '180 р';
        $thePopularityOfTheDish_11 = 8;
        $recipe_11 = false;
        $photoForDish_11 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(80);
        $main_foods_11 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_11, $linkToDish_11, $priceDish_11, $thePopularityOfTheDish_11,
                        $recipe_11, $photoForDish_11,$typeDish_2);
        
        $dishName_12 = 'Картофельная запеканка с грибами';
        $linkToDish_12 = '/restaurant/public/index.php/restaurant/single/i12/foods';
        $priceDish_12 = '190 р';
        $thePopularityOfTheDish_12 = 18;
        $recipe_12 = true;
        $photoForDish_12 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(81);
        $main_foods_12 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_12, $linkToDish_12, $priceDish_12, $thePopularityOfTheDish_12,
                        $recipe_12, $photoForDish_12,$typeDish_2);
        
        $dishName_13 = 'Рассыпчатый плов с курицей';
        $linkToDish_13 = '/restaurant/public/index.php/restaurant/single/i13/foods';
        $priceDish_13 = '130 р';
        $thePopularityOfTheDish_13 = 9;
        $recipe_13 = true;
        $photoForDish_13 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(82);
        $main_foods_13 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_13, $linkToDish_13, $priceDish_13, $thePopularityOfTheDish_13,
                        $recipe_13, $photoForDish_13,$typeDish_2);
        
        $dishName_14 = 'Гуляш из свинины';
        $linkToDish_14 = '/restaurant/public/index.php/restaurant/single/i14/foods';
        $priceDish_14 = '190 р';
        $thePopularityOfTheDish_14 = 10;
        $recipe_14 = false;
        $photoForDish_14 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(83);
        $main_foods_14 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_14, $linkToDish_14, $priceDish_14, $thePopularityOfTheDish_14,
                        $recipe_14, $photoForDish_14,$typeDish_2);
        
        $dishName_15 = 'Сырный омлет с помидорами';
        $linkToDish_15 = '/restaurant/public/index.php/restaurant/single/i15/foods';
        $priceDish_15 = '70 р';
        $thePopularityOfTheDish_15 = 6;
        $recipe_15 = false;
        $photoForDish_15 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(75);
        $main_foods_15 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_15, $linkToDish_15, $priceDish_15, $thePopularityOfTheDish_15,
                        $recipe_15, $photoForDish_15, $typeDish_2);
        
        $dishName_16 = 'Стейк из говядины';
        $linkToDish_16 = '/restaurant/public/index.php/restaurant/single/i16/foods';
        $priceDish_16 = '190 р';
        $thePopularityOfTheDish_16 = 10;
        $recipe_16 = false;
        $photoForDish_16 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(76);
        $main_foods_16 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_16, $linkToDish_16, $priceDish_16, $thePopularityOfTheDish_16,
                        $recipe_16, $photoForDish_16,$typeDish_2);
        
        //салаты
        $dishName_17 = 'Салат "Оливье" с колбасой и свежими огурчиками';
        $linkToDish_17 = '/restaurant/public/index.php/restaurant/single/i17/foods';
        $priceDish_17 = '135 р';
        $thePopularityOfTheDish_17 = 13;
        $recipe_17 = true;
        $photoForDish_17 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(65);
        $typeDish_3 = $sortedKindsDish_3;
        $main_foods_17 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_17, $linkToDish_17, $priceDish_17, $thePopularityOfTheDish_17,
                        $recipe_17, $photoForDish_17, $typeDish_3);
        
        $dishName_18 = 'Праздничный салат "Селедка под шубой"';
        $linkToDish_18 = '/restaurant/public/index.php/restaurant/single/i18/foods';
        $priceDish_18 = '180 р';
        $thePopularityOfTheDish_18 = 5;
        $recipe_18 = false;
        $photoForDish_18 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(66);
        $main_foods_18 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_18, $linkToDish_18, $priceDish_18, $thePopularityOfTheDish_18,
                        $recipe_18, $photoForDish_18, $typeDish_3);
        
        $dishName_19 = 'Греческий салат с курицей и сухариками';
        $linkToDish_19 = '/restaurant/public/index.php/restaurant/single/i19/foods';
        $priceDish_19 = '110 р';
        $thePopularityOfTheDish_19 = 10;
        $recipe_19 = false;
        $photoForDish_19 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(67);
        $main_foods_19 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_19, $linkToDish_19, $priceDish_19, $thePopularityOfTheDish_19,
                        $recipe_19, $photoForDish_19, $typeDish_3);
        
        $dishName_20 = 'Грибной салат с мясом';
        $linkToDish_20 = '/restaurant/public/index.php/restaurant/single/i20/foods';
        $priceDish_20 = '120 р';
        $thePopularityOfTheDish_20 = 19;
        $recipe_20 = true;
        $photoForDish_20 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(68);
        $main_foods_20 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_20, $linkToDish_20, $priceDish_20, $thePopularityOfTheDish_20,
                        $recipe_20, $photoForDish_20, $typeDish_3);
        
        $dishName_21 = 'Деревенский салат с грибами';
        $linkToDish_21 = '/restaurant/public/index.php/restaurant/single/i21/foods';
        $priceDish_21 = '150 р';
        $thePopularityOfTheDish_21 = 11;
        $recipe_21 = true;
        $photoForDish_21 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(69);
        $main_foods_21 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_21, $linkToDish_21, $priceDish_21, $thePopularityOfTheDish_21,
                        $recipe_21, $photoForDish_21, $typeDish_3);
        
        $dishName_22 = 'Горячий салат с рыбой и ростками фасоли';
        $linkToDish_22 = '/restaurant/public/index.php/restaurant/single/i22/foods';
        $priceDish_22 = '100 р';
        $thePopularityOfTheDish_22 = 8;
        $recipe_22 = false;
        $photoForDish_22 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(70);
        $main_foods_22 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_22, $linkToDish_22, $priceDish_22, $thePopularityOfTheDish_22,
                        $recipe_22, $photoForDish_22, $typeDish_3);
        
        $dishName_23 = 'Салат из куриного филе, с капустой и бобами';
        $linkToDish_23 = '/restaurant/public/index.php/restaurant/single/i23/foods';
        $priceDish_23 = '130 р';
        $thePopularityOfTheDish_23 = 14;
        $recipe_23 = true;
        $photoForDish_23 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(71);
        $main_foods_23 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_23, $linkToDish_23, $priceDish_23, $thePopularityOfTheDish_23,
                        $recipe_23, $photoForDish_23, $typeDish_3);
        
        $dishName_24 = 'Салат "Астория" из овощей и фруктов';
        $linkToDish_24 = '/restaurant/public/index.php/restaurant/single/i24/foods';
        $priceDish_24 = '60 р';
        $thePopularityOfTheDish_24 = 10;
        $recipe_24 = false;
        $photoForDish_24 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(72);
        $main_foods_24 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_24, $linkToDish_24, $priceDish_24, $thePopularityOfTheDish_24,
                        $recipe_24, $photoForDish_24, $typeDish_3);
        
        //напитки
        $dishName_25 = 'Кубанское красное вино Каберне';
        $linkToDish_25 = '/restaurant/public/index.php/restaurant/single/i25/foods';
        $priceDish_25 = '800 р';
        $thePopularityOfTheDish_25 = 8;
        $recipe_25 = false;
        $photoForDish_25 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(45);
        $typeDish_4 = $sortedKindsDish_4;
        $main_foods_1 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_25, $linkToDish_25, $priceDish_25, $thePopularityOfTheDish_25,
                        $recipe_25, $photoForDish_25, $typeDish_4);
        
        $dishName_26 = 'Вино Chevalier de Bur Blanc Moelleux 0.75 л';
        $linkToDish_26 = '/restaurant/public/index.php/restaurant/single/i26/foods';
        $priceDish_26 = '900 р';
        $thePopularityOfTheDish_26 = 10;
        $recipe_26 = false;
        $photoForDish_26 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(50);
        $main_foods_26 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_26, $linkToDish_26, $priceDish_26, $thePopularityOfTheDish_26,
                        $recipe_26, $photoForDish_26, $typeDish_4);
        
        $dishName_27 = 'Глинтвейн';
        $linkToDish_27 = '/restaurant/public/index.php/restaurant/single/i27/foods';
        $priceDish_27 = '600 р';
        $thePopularityOfTheDish_27 = 10;
        $recipe_27 = false;
        $photoForDish_27 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(51);
        $main_foods_27 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_27, $linkToDish_27, $priceDish_27, $thePopularityOfTheDish_27,
                        $recipe_27, $photoForDish_27,$typeDish_4);
        
        $dishName_28 = 'Чайный грог с пряностями';
        $linkToDish_28 = '/restaurant/public/index.php/restaurant/single/i28/foods';
        $priceDish_28 = '400 р';
        $thePopularityOfTheDish_28 = 18;
        $recipe_28 = true;
        $photoForDish_28 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(52);
        $main_foods_28 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_28, $linkToDish_28, $priceDish_28, $thePopularityOfTheDish_28,
                        $recipe_28, $photoForDish_28, $typeDish_4);
        
        $dishName_29 = 'Морс клюквенный, брусничный, черносмородиновый или малиновый';
        $linkToDish_29 = '/restaurant/public/index.php/restaurant/single/i29/foods';
        $priceDish_29 = '90 р';
        $thePopularityOfTheDish_29 = 16;
        $recipe_29 = true;
        $photoForDish_29 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(53);
        $main_foods_29 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_29, $linkToDish_29, $priceDish_29, $thePopularityOfTheDish_29,
                        $recipe_29, $photoForDish_29, $typeDish_4);
        
        $dishName_30 = 'Кофе латте по-домашнему';
        $linkToDish_30 = '/restaurant/public/index.php/restaurant/single/i30/foods';
        $priceDish_30 = '120 р';
        $thePopularityOfTheDish_30 = 10;
        $recipe_30 = false;
        $photoForDish_30 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(54);
        $main_foods_30 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_30, $linkToDish_30, $priceDish_30, $thePopularityOfTheDish_30,
                        $recipe_30, $photoForDish_30, $typeDish_4);
        
        $dishName_31 = 'Коктейль Мохито алкогольный';
        $linkToDish_31 = '/restaurant/public/index.php/restaurant/single/i31/foods';
        $priceDish_31 = '130 р';
        $thePopularityOfTheDish_31 = 12;
        $recipe_31 = false;
        $photoForDish_31 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(55);
        $main_foods_31 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_31, $linkToDish_31, $priceDish_31, $thePopularityOfTheDish_31,
                        $recipe_31, $photoForDish_31, $typeDish_4);
        
        $dishName_32 = 'Ром Bacardi OakHeart Smoked Cinnamon 0.7 л';
        $linkToDish_32 = '/restaurant/public/index.php/restaurant/single/i32/foods';
        $priceDish_32 = '1300 р';
        $thePopularityOfTheDish_32 = 10;
        $recipe_32 = false;
        $photoForDish_32 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(56);
        $main_foods_32 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_32, $linkToDish_32, $priceDish_32, $thePopularityOfTheDish_32,
                        $recipe_32, $photoForDish_32, $typeDish_4);
        
        $dishName_33 = 'Сок апельсиновый';
        $linkToDish_33 = '/restaurant/public/index.php/restaurant/single/i33/foods';
        $priceDish_33 = '100 р';
        $thePopularityOfTheDish_33 = 10;
        $recipe_33 = false;
        $photoForDish_33 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(57);
        $main_foods_33 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_33, $linkToDish_33, $priceDish_33, $thePopularityOfTheDish_33,
                        $recipe_33, $photoForDish_33, $typeDish_4);
        
        $dishName_34 = 'Горячий шоколад с тыквенным соусом';
        $linkToDish_34 = '/restaurant/public/index.php/restaurant/single/i34/foods';
        $priceDish_34 = '120 р';
        $thePopularityOfTheDish_34 = 18;
        $recipe_34 = true;
        $photoForDish_34 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(46);
        $main_foods_34 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_34, $linkToDish_34, $priceDish_34, $thePopularityOfTheDish_34,
                        $recipe_34, $photoForDish_34, $typeDish_4);
        
        $dishName_35 = 'Коктейль алкогольный "Красный грех"';
        $linkToDish_35 = '/restaurant/public/index.php/restaurant/single/i35/foods';
        $priceDish_35 = '190 р';
        $thePopularityOfTheDish_35 = 12;
        $recipe_35 = false;
        $photoForDish_35 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(47);
        $main_foods_35 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_35, $linkToDish_35, $priceDish_35, $thePopularityOfTheDish_35,
                        $recipe_35, $photoForDish_35, $typeDish_4);
        
        $dishName_36 = 'Коктейль "Любовь на пляже"';
        $linkToDish_36 = '/restaurant/public/index.php/restaurant/single/i36/foods';
        $priceDish_36 = '120 р';
        $thePopularityOfTheDish_36 = 10;
        $recipe_36 = false;
        $photoForDish_36 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(48);
        $main_foods_36 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_36, $linkToDish_36, $priceDish_36, $thePopularityOfTheDish_36,
                        $recipe_36, $photoForDish_36, $typeDish_4);
        
        $dishName_37 = 'Лимончелло';
        $linkToDish_37 = '/restaurant/public/index.php/restaurant/single/i37/foods';
        $priceDish_37 = '90 р';
        $thePopularityOfTheDish_37 = 10;
        $recipe_37 = true;
        $photoForDish_37 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(49);
        $main_foods_37 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_37, $linkToDish_37, $priceDish_37, $thePopularityOfTheDish_37,
                        $recipe_37, $photoForDish_37, $typeDish_4);
        
        //десерты
        $dishName_38 = 'Шоколадный торт с творожно-сметанным кремом';
        $linkToDish_38 = '/restaurant/public/index.php/restaurant/single/i38/foods';
        $priceDish_38 = '130 р';
        $thePopularityOfTheDish_38 = 10;
        $recipe_38 = false;
        $photoForDish_38 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(58);
        $typeDish_5 = $sortedKindsDish_5;
        $main_foods_38 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_38, $linkToDish_38, $priceDish_38, $thePopularityOfTheDish_38,
                        $recipe_38, $photoForDish_38, $typeDish_5);
        
        $dishName_39 = 'Панна котта';
        $linkToDish_39 = '/restaurant/public/index.php/restaurant/single/i39/foods';
        $priceDish_39 = '120 р';
        $thePopularityOfTheDish_39 = 14;
        $recipe_39 = true;
        $photoForDish_39 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(59);
        $main_foods_39 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_39, $linkToDish_39, $priceDish_39, $thePopularityOfTheDish_39,
                        $recipe_39, $photoForDish_39, $typeDish_5);
        
        $dishName_40 = 'Творожно-банановый мусс';
        $linkToDish_40 = '/restaurant/public/index.php/restaurant/single/i40/foods';
        $priceDish_40 = '110 р';
        $thePopularityOfTheDish_40 = 16;
        $recipe_40 = true;
        $photoForDish_40 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(60);
        $main_foods_40 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_40, $linkToDish_40, $priceDish_40, $thePopularityOfTheDish_40,
                        $recipe_40, $photoForDish_40, $typeDish_5);
        
        $dishName_41 = 'Творожный мусс "Неженка"';
        $linkToDish_41 = '/restaurant/public/index.php/restaurant/single/i41/foods';
        $priceDish_41 = '130 р';
        $thePopularityOfTheDish_41 = 15;
        $recipe_41 = false;
        $photoForDish_41 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(61);
        $main_foods_41 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_41, $linkToDish_41, $priceDish_41, $thePopularityOfTheDish_41,
                        $recipe_41, $photoForDish_41, $typeDish_5);
        
        $dishName_42 = 'Десерт из творога, с малиной и печеньем';
        $linkToDish_42 = '/restaurant/public/index.php/restaurant/single/i42/foods';
        $priceDish_42 = '90 р';
        $thePopularityOfTheDish_42 = 12;
        $recipe_42 = false;
        $photoForDish_42 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(62);
        $main_foods_42 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_42, $linkToDish_42, $priceDish_42, $thePopularityOfTheDish_42,
                        $recipe_42, $photoForDish_42, $typeDish_5);
        
        $dishName_43 = 'Десерт "Павлова"';
        $linkToDish_43 = '/restaurant/public/index.php/restaurant/single/i43/foods';
        $priceDish_43 = '110 р';
        $thePopularityOfTheDish_43 = 10;
        $recipe_43 = false;
        $photoForDish_43 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(63);
        $main_foods_43 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_43, $linkToDish_43, $priceDish_43, $thePopularityOfTheDish_43,
                        $recipe_43, $photoForDish_43, $typeDish_5);
        
        $dishName_44 = 'Десерт с шоколадным муссом';
        $linkToDish_44 = '/restaurant/public/index.php/restaurant/single/i44/foods';
        $priceDish_44 = '120 р';
        $thePopularityOfTheDish_44 = 10;
        $recipe_44 = false;
        $photoForDish_44 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(64);
        $main_foods_44 = $main_foods_in_the_restaurant
                ->WriteInDatabase($dishName_44, $linkToDish_44, $priceDish_44, $thePopularityOfTheDish_44,
                        $recipe_44, $photoForDish_44, $typeDish_5);
        
        
        debug('всё записано');
        //die();
        
    }
    
    public function writeFonAndSideMenu()
    {
        $writeFonAndSidemenu = new PhotoFonAndSideMenu($this->entityManager);
        //$writeFonAndSidemenu->writePhotoFon();
        //$writeFonAndSidemenu->writeSideMenu();
        $writeFonAndSidemenu->writePhotoFonFoods();
        $writeFonAndSidemenu->writeSideMenuFoods();
        
        debug('данные в боковое меню записаны');
        //die();
    }
    
    
    
    
}
