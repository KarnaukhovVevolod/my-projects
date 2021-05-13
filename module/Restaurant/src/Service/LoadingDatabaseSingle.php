<?php

namespace Restaurant\Service;

use Restaurant\Entity\Photorestaurant;
use Restaurant\Entity\DishInTheRestaurant;
use Restaurant\Entity\EventsInTheRestaurant;

use Restaurant\Entity\TableWithDishDescriptionRestaurant;
use Restaurant\Service\GetAuxiliaryData\TableWithEventDescriptionRestaurantget;
use Restaurant\Entity\TableWithEventDescriptionRestaurant;
use Restaurant\Service\GetAuxiliaryData\PhotoFonAndSideMenu;
use Restaurant\Service\GetAuxiliaryData\TableWithDishDescriptionRestaurantget;

/**
 * Description of LoadingDatabaseSingle
 *
 * @author Seva
 */
class LoadingDatabaseSingle {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function writeFonAndSideMenu(){
        //$writeFonAndSidemenu = new PhotoFonAndSideMenu($this->entityManager);
        //$writeFonAndSidemenu->writePhotoFonSingleFood();
    }
    
    public function writeFonAndSideMenuEvents(){
        $writeFonAndSidemenu = new PhotoFonAndSideMenu($this->entityManager);
        $writeFonAndSidemenu->writePhotoFonSingleEvents();
    }
    
    //записываем статьи про еду
    public function setDataSingleFoods()
    {
        $singleFoods = new TableWithDishDescriptionRestaurantget($this->entityManager);
        
        // ---=== first article ===---
        $head_dish_1 = 'Картофельный суп с курицей';
        $head_dish_2 = 'Состав супа';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(84);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(84);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Очень вкусным, насыщенным, но в тоже время и легким получается картофельный суп с курицей. Это очень вкусное первое блюдо разнообразит повседневный стол и обязательно понравится вашим родным. Для супа можете использовать любые части курицы, у меня - спинка, кончики крылышек и часть ножки. Здесь мяса много не нужно, главное - вкусный бульон.';
        $text_description_3 = '';
        $text_description_4 = 'Для приготовления картофельного супа с курицей понадобится:
            <br> - части курицы любые - 250 г;
            <br> - картофель (у меня молодой картофель) - 4-5 шт.;
            <br> - лук репчатый - 1 шт.;
            <br> - морковь небольшая - 1 шт.;
            <br> - соль, специи для супа - по вкусу;
            <br> - шафран имеретинский - 1 ч. л.;
            <br> - чеснок - 1 зубчик;
            <br> - лавровый лист - 1 шт.;
            <br> - масло растительное - 2 ст. л.;
            <br> - вода - 2 литра;
            <br> - перец черный молотый, зелень для подачи.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(1);
        
        $food_article_1 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_1 = $food_article_1->WriteInDatabase();
        
        // ---=== end first article ===--- 
        
        // ---=== second article ===---
        $head_dish_1 = 'Борщь классический';
        $head_dish_2 = 'Состав борща';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(85);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(85);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Этот постный борщ, прежде всего, не для тех, кто хочет похудеть, а для тех, кому нельзя жирного, жареного, слишком кислого, острого и т.д. В этом борще максимум овощей, а яркий цвет достигается, благодаря достаточно большому количеству свеклы. Готовится блюдо на воде, без добавления мяса и специй (кроме сладкой паприки), с минимальным количеством растительного масла, без обжаривания ингредиентов. Борщ получается очень вкусным, но не совсем похожим на классический, он чуть сладковатый и в нём нет выраженной кислоты. Это блюдо можно точно давать и маленьким деткам!';
        $text_description_3 = '';
        $text_description_4 = 'Для приготовления диетического борща без зажарки понадобится:
<br> - картофель - 2 шт.;
<br> - капуста белокочанная - 150 г;
<br> - лук репчатый - 1 шт.;
<br> - морковь (небольшая) - 1 шт.;
<br> - перец сладкий болгарский - 1 шт.;
<br> - свекла (крупная) - 1 шт.;
<br> - чеснок - 1 зубчик;
<br> - помидоры свежие (небольшие, я использовала свежемороженые) - 2 шт.;
<br> - масло растительное рафинированное - 1 ст. л.;
<br> - соль - по вкусу;
<br> - сахар - 1-2 ч. л.;
<br> - паприка сладкая - 0,5 ч. л.;
<br> - травы сушёные любые - щепотка;
<br> - вода - 1,5-1,7 литра.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(2);
        
        $food_article_2 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_2 = $food_article_2->WriteInDatabase();
        
        
        // ---=== end second article ===-- 
        
        
        // ---=== three article ===---
        
        
        $head_dish_1 = 'Окрошка с калбосой';
        $head_dish_2 = 'Состав окрошки';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(86);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(86);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Рецептов окрошек существует множество. Предлагаю Вам свой - окрошка на кефире с колбасой. Такую окрошку в моей семье любят все без исключения, но особенно она нравится мужу и сыну. Это и понятно, окрошечка получается очень вкусной, густой и довольно сытной. Попробуйте!';
        $text_description_3 = '';
        $text_description_4 = 'Для приготовления окрошки с колбасой понадобится:
<br> - картофель - 2-3 шт.;
<br> - огурцы свежие - 3-4 шт.;
<br> - яйца - 3-4 шт.;
<br> - зелень укропа, лука - по 0,5 пучка;
<br> - сметана 15% - 3 ст. л.;
<br> - майонез 30% - 1-2 ст. л.;
<br> - кефир 1 % - 1 литр;
<br> - кефир 2,5 % - 0,5 литра;
<br> - соль, сок лимона - по вкусу;
<br> - сахар - 1-2 ч. л.;
<br> - вода очищенная или минеральная - 0,5-0,7 литра.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(3);
        
        $food_article_3 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_3 = $food_article_3->WriteInDatabase();
        
        // ---=== end three article ===---
        
        // ---=== four article ===---
        
        $head_dish_1 = 'Рассольник';
        $head_dish_2 = 'Состав рассольника';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(87);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(87);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Рассольник - блюдо русской кухни, которое готовится с солеными огурцами.  Этот суп варят с перловкой или рисом, на мясном бульоне или на воде. Я предлагаю рецепт рассольника с мясными фрикадельками и рисом. Блюдо простое, сытное и вкусное.';
        $text_description_3 = '';
        $text_description_4 = 'Для приготовления рассольника понадобится:
<br> - мясо (у меня курица) - 500 г;
<br> - вода - 2 л;
<br> - фарш (у меня говяжий) - 300 г;
<br> - лук репчатый - 2 шт.;
<br> - рис - 2 ст. л.;
<br> - чеснок - 2 зубчика;
<br> - яйцо - 1 шт.;
<br> - картофель - 2 шт.;
<br> - морковь - 1 шт.;
<br> - огурец соленый (большой) - 1 шт.;
<br> - подсолнечное масло - 20 мл;
<br> - соль - по вкусу;
<br> - перец черный молотый - по вкусу.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(4);
        
        $food_article_4 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_4 = $food_article_4->WriteInDatabase();
        
        // ---=== end four article ===---
        
        // ---=== five article ===---
        
        $head_dish_1 = 'Грибной суп-пюре';
        $head_dish_2 = 'Состав грибного супа-пюре';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(88);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(88);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Предлагаю приготовить замечательный и ароматный картофельный суп-пюре с грибами. Просто и вкусно. Он придется по вкусу и детям, и взрослым.';
        $text_description_3 = '';
        $text_description_4 = 'Для приготовления картофельного супа-пюре с грибами потребуется:
<br> - Картофель - 5 шт.;
<br> - Лук репчатый - 1 шт.;
<br> - Морковь - 1 шт.;
<br> - Грибы - 300 г;
<br> - Сливки 20-33% - 150 г;
<br> - Масло растительное - 3 ст. ложки;
<br> - Лавровый лист - 1 шт.;
<br> - Вода кипяченая (горячая) - 1,5 л;
<br> - Соль - по вкусу;
<br> - Перец чёрный молотый - по вкусу.;
<br> Для подачи (по желанию):
<br> - Сухарики;
<br> - Зелень свежая.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(5);
        
        $food_article_5 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_5 = $food_article_5->WriteInDatabase();
        
        // ---=== end five article ===---
        
        //вторые блюда
        
        // ---=== six article ===---
         
        $head_dish_1 = 'Каша молочная';
        $head_dish_2 = 'Состав молочной каши';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(74);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(74);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Рисовая молочная каша - идеальный вариант очень вкусного и невероятно полезного завтрака. Мой вариант приготовления понравится даже тем деткам, которые не любят молоко и не хотят есть кашу.';
        $text_description_3 = '';
        $text_description_4 = 'Приготовить молочную кашу не составит труда даже молодой хозяйке. Мой пошаговый рецепт, как приготовить кашу рисовую молочную, поможет разобраться и сделать все правильно, чтобы в результате получилось вкусное и сытное блюдо. Молочную рисовую кашу я очень часто готовлю своему маленькому сыну, он с удовольствием уплетает ее. Очень люблю эту кашу и я. Нравится мне то, что она вкусная и сама по себе, и с различными добавками, часто я кладу в нее свежие и консервированные фрукты (клубнику, бананы, яблоки), которые придают каше новые оттенки вкуса.
<br> <span>Ингредиенты:</span> 
<br> - Рис — 200 Грамм;
<br> - Молоко — 500 Миллилитров;
<br> - Вода — 200 Миллилитров;
<br> - Сахар  — 1 Ст. ложка;
<br> - Масло сливочное  — 30 Грамм. 
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(6);
        
        $food_article_6 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_6 = $food_article_6->WriteInDatabase();
        
        // ---=== end six article ===---
         
        
        // ---=== seven article ===---
         
        $head_dish_1 = 'Жаркое по деревенски';
        $head_dish_2 = 'Состав грибного супа-пюре';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(77);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(77);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Неповторимое жаркое по-деревенски, приготовленное из сочной свинины и свежих овощей. Блюдо подходит для обеденного стола или на ужин. Обязательно пробуем!';
        $text_description_3 = '';
        $text_description_4 = 'Перед вами - простой рецепт приготовления жаркого по-деревенски. Для жаркого я использовал: свиной ошеек, лук, помидоры, болгарский перец, картофель, чеснок овощной бульон, петрушку и специи. Получилось очень вкусно и сытно! Идеально подходит для семейного обеда!
<br> - Свиной ошеек  — 800 Грамм;
<br> - Лук репчатый  — 1 Штука;
<br> - Чеснок  — 3 Зубчика;
<br> - Перец болгарский  — 2 Штуки (красный и зеленый);
<br> - Помидоры  — 2 Штуки;
<br> - Соль  — По вкусу;
<br> - Перец  — По вкусу;
<br> - Лавровый лист  — 2 Штуки;
<br> - Масло растительное  — 50 Миллилитров;
<br> - Картофель  — По вкусу;
<br> - Бульон овощной  — 250 Миллилитров;
<br> - Петрушка  — По вкусу.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(7);
        
        $food_article_7 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_7 = $food_article_7->WriteInDatabase();
        
        
        // ---=== end seven article ===---
        
        // ---=== eight article  ===---
        
        $head_dish_1 = 'Паста карбонадо';
        $head_dish_2 = 'Состав пасты';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(78);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(78);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Паста Карбонара (или спагетти Карбонара) — очень популярное блюдо итальянской кухни. Это спагетти с кусочками гуанчиале (сыровяленые свиные щёки), смешанные с соусом из яиц, сыра пармезан, соли и свежемолотого черного перца. Гуанчиале нередко заменяется панче́ттой (с итальянского pancetta — «грудинка» — разновидность бекона), поэтому пусть вас не пугают названия незнакомых мясных продуктов итальянской кухни, берите известные вам грудинку или бекон, только не копчённые. Соус Карбонара доходит до полной готовности от тепла только что сваренной горячей пасты. В классическом итальянском варианте соус Карбонара готовится без сливок, только с желтками, но в других странах сливки в соус нередко добавляют. Я предлагаю готовить пасту Карбонара со сливками, мне такой вариант больше нравится. Чеснок тоже в классическую пасту Карбонара не добавляется, но как мы уже выяснили, мы с вами будем готовить не самую аутентичную пасту, а уже немного адаптированную.';
        $text_description_3 = '';
        $text_description_4 = 'Перед вами - простой рецепт приготовления пасты карбонара:'. 
'<br> - спагетти 200 г;
<br> - бекон 150 г;
<br> - сливки 20% 150 мл;
<br> - сыр пармезан 50 г;
<br> - яичный желток 3 шт;
<br> - чеснок 2-3 зубчика;
<br> - масло растительное для жарки;
<br> - соль;
<br> - перец чёрный.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(8);
        
        $food_article_8 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_8 = $food_article_8->WriteInDatabase() ;
        
        
        
        // ---=== end eight article ===---
        
        // ---=== nine article ===---
        
        $head_dish_1 = 'Запечённое мясо в картофельной шубе';
        $head_dish_2 = 'Состав запечённого мяса в картофельной шубе';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(79);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(79);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Мясо в картофельной шубке - отказаться невозможно! Интересный вариант с картошкой, мясом и сыром! Готовится легко, получается вкусно! Кто пробовал, просят ещё! Готовьте на здоровье!';
        $text_description_3 = '';
        $text_description_4 = 'Перед вами - простой рецепт приготовления мясо в картофельной шубке:'. 
'<br> - Картофель - 800-900 г;
<br> - Фарш мясной - 600 г;
<br> - Лук репчатый - 1 шт;
<br> - Сыр твёрдый - 200 г
<br> - Яйца - 2 шт;
<br> - Соль - по вкусу;
<br> - Перец чёрный молотый - по вкусу;
<br> - Зелень петрушки - по вкусу;
<br> - Масло растительное - для жарки.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(9);
        
        $food_article_9 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_9 = $food_article_9->WriteInDatabase();
        
        
        // ---=== end nine article ===---
        // ---=== ten article ===---
        
        $head_dish_1 = 'Блины с ветчиной и сыром';
        $head_dish_2 = 'Состав блинов с ветчиной и сыром';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(73);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(73);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Горячие нежные блинчики с ветчиной и сыром – не только сытный, но и вкусный завтрак или перекус! Предлагаем вашему вниманию простой пошаговый рецепт приготовления блинчиков с ветчиной и сыром!';
        $text_description_3 = '';
        $text_description_4 = 'Оцените простой рецепт блинчиков с ветчиной и сыром. Классический рецепт блинчиков с ветчиной и сыром вы всегда сможете разнообразить, добавив к рецепту помидоры или грибы:'. 
'<br> - Яйца — 4 Штуки (3 - в тесто, 1 - для обжарки);'
.'<br> - Молоко  — 200 Миллилитров;'
.'<br> Вода  — 250 Миллилитров;'
.'<br> Мука  — 260 Грамм;'
.'<br> Соль  — 1 Чайная ложка;'
.'<br> Сахар  — 2 Ст. ложки;'
.'<br> Сыр  — 250 Грамм (любой желтый на ваш вкус);'
.'<br> Ветчина  — 400 Грамм.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(10);
        
        $food_article_10 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_10 = $food_article_10->WriteInDatabase();
        
        
        // ---=== end ten article ===---
        
        // ---=== eleven article ===---
        $head_dish_1 = 'Шашлык из свинины';
        $head_dish_2 = 'Состав шашлыка из свинины';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(80);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(80);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Как известно, секрет вкусного шашлыка таится прежде всего в маринаде. Именно маринад придает мясу особый вкус и аромат, делает его сочным и нежным. Рецептов маринования мяса существует множество, но не всякий рецепт придаст шашлыку незабываемый вкус. Приготовьте свиной шашлык в пряном маринаде, основой которого будет репчатый лук и специи. Такой шашлык обязательно захочется повторить.';
        $text_description_3 = '';
        $text_description_4 = 'Оцените простой рецепт шашлыка из свинины: '. 
'<br> - Свинина - 1 кг;
<br> - Лук репчатый - 170 г
<br> - Масло растительное - 50 мл
<br> - Куркума - 1 ч. ложка
<br> - Паприка сладкая - 1 ч. ложка
<br> - Перец чили молотый - 1/2 ч. ложки
<br> - Перец чёрный молотый - 1 ч. ложка
<br> - Соль - 1 ч. ложка.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(11);
        
        $food_article_11 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_11 = $food_article_11->WriteInDatabase();
        
        // ---=== end eleven article ===---
        // ---=== twelve article ===--- 
        
        $head_dish_1 = 'Картофельная запеканка с грибами';
        $head_dish_2 = 'Состав картофельной запеканки с грибами';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(81);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(81);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Картофель, картошка, картошечка…. Это всегда вкусно и всегда актуально. Картошку варят, жарят, тушат, запекают, можно приготовить пюре, можно приготовить запеканку с мясом, с грибами или овощами. Предлагаем вам рецепт очень нежной и вкусной картофельной запеканки с грибами.';
        $text_description_3 = '';
        $text_description_4 = 'Оцените простой рецепт картофельной запеканки с грибами: '. 
'<br> - Картофель – 1 килограмм;
<br> - Яйца – 2-3 штуки;
<br> - Лук – 3 штуки;
<br> - Молоко – 1 стакан;
<br> - Масло сливочное – 3 столовые ложки;
<br> - Грибы – 300 грамм;
<br> - Масло растительное – 2 столовые ложки;
<br> - Сметана – 2-3 столовые ложки;
<br> - Соль – 2 чайные ложки;
<br> - Перец черный молотый – 0.5 чайной ложки.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(12);
        
        $food_article_12 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_12 = $food_article_12->WriteInDatabase();
        
        
        // ---=== end twelve article ===---
        
        // ---=== thirteen article ===---
        
        $head_dish_1 = 'Рассыпчатый плов с курицей';
        $head_dish_2 = 'Состав рассыпчатого плова с курицей';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(82);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(82);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Приготовить плов можно из любого мяса. Сегодня готовлю из курицы, но на выбор можно взять свинину, барашка или говядину. Это не совсем узбекский плов, но тоже очень рассыпчатый и вкусный. Как сделать плов, а не кашу? Есть несколько принципов. Расскажу, как я его готовлю для своей семьи.';
        $text_description_3 = '';
        $text_description_4 = 'Оцените простой рецепт рассыпчатого плова с курицей: '. 
'<br> - Курица – 500 г;
<br> - Рис – 500 г;
<br> - Морковь - 500 г;
<br> - Чеснок – 1 головка;
<br> - Лук репчатый – 1 шт;
<br> - Соль - по вкусу;
<br> - Перец черный молотый - по вкусу;
<br> - Зира – по вкусу;
<br> - Приправа для плова - по вкусу;
<br> - Масло растительное (жир) – 120 мл.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(13);
        
        $food_article_13 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_13 = $food_article_13->WriteInDatabase();
        
        
        // ---=== end thirteen article ===---
        // ---=== fourteen article ===--- 
        
        $head_dish_1 = 'Гуляш из свинины';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(83);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(83);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Гуляш – венгерское национальное блюдо. Гуляш – густой суп из тушёных кусочков мяса, помидоров, картофеля, лука и паприки. Гуляш по-венгерски, т.е. в классическом варианте, относится именно к густым супам. Но гуляш оказался настолько хорош, что получил даже большее распространение в качестве второго блюда.';
        $text_description_3 = '';
        $text_description_4 = 'Простой вариант рецепта гуляша, из свинины, с луком и томатной пастой:'. 
'<br> - Мясо (свинина) - 300 г.;
<br> - Лук репчатый - 1 шт.;
<br> - Томатная паста - 2 ст.л.;
<br> - Мука - 0,5-0,75 ст.л.;
<br> - Вода - 200 мл;
<br> - Масло растительное - для обжаривания.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(14);
        
        $food_article_14 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_14 = $food_article_14->WriteInDatabase();
        
        
        // ---=== end fourteen article ===---
        
        // ---=== fifteen article ===---
        
        $head_dish_1 = 'Сырный омлет с помидорами';
        $head_dish_2 = 'Состав cырного омлета с помидорами';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(75);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(75);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Лето - пора овощей. Люблю помидоры. Предложу интересный рецепт завтрака - сырный омлет с помидорами. Просто и вкусно.';
        $text_description_3 = '';
        $text_description_4 = 'Простой вариант рецепта cырного омлета с помидорами:'. 
'<br> - Помидоры свежие - 1-2 шт.;
<br> - Яйца - 3 шт.;
<br> - Сыр твердый - 50 г;
<br> - Молоко - 3-4 ст. ложки;
<br> - Масло растительное (сливочное) - 2-3 ст. ложки;
<br> - Соль - по вкусу;
<br> - Перец - по вкусу;
<br> - Зелень - по вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(15);
        
        $food_article_15 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_15 = $food_article_15->WriteInDatabase();
        
        
        // ---=== end fifteen article ===---
        
        // ---=== sixteen article ===---
        
        $head_dish_1 = 'Стейк из говядины';
        $head_dish_2 = 'Состав cтейка из говядины';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(76);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(76);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Стейк – толстый обжаренный кусок мяса, предварительно порезанный поперёк волокон. Блюдо очень древнее, как готовить стейк знали еще жители Древнего Рима. Мясо для стейка используется самое разнообразное: свинина, говядина, курица, индейка. Можно готовить также и рыбный стейк.';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт сочного и невероятно вкусного стейка из говядины средней прожарки (медиум):'. 
'<br> - Говядина (биток) - 500 г;
<br> - Соль;
<br> - Перец чёрный молотый;
<br> - Специи;
<br> - Масло растительное.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(16);
        
        $food_article_16 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_16 = $food_article_16->WriteInDatabase();
        
        
        // ---=== end sixteen article ===---
        
        //салаты
        
        // ---=== seventeen article ===---
        
        $head_dish_1 = 'Салат "Оливье" с колбасой и свежими огурчиками';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(65);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(65);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Салат «Оливье» с колбасой и свежим огурцом - один из легких летних вариантов этого знаменитого салата.';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт салата «Оливье» с колбасой и свежим огурцом:'. 
'<br> - Огурец свежий - 400 г.;
<br> - Картошка - 350 г.;
<br> - Колбаса - 300 г.;
<br> - Горошек зеленый - 1 банка.;
<br> - Яйца - 3 шт.;
<br> - Морковь - 1 шт.;
<br> - Лук зеленый - 1 пучок.;
<br> - Петрушка свежая - 1 ст.л.;
<br> - Сметана - 250 г.;
<br> - Майонез - 1 ст.л.;
<br> - Соль и перец - по вкусу.;
<br> - Вода для варки - по потребности.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(17);
        
        $food_article_17 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_17 = $food_article_17->WriteInDatabase();
        
        
        // ---=== end seventeen article ===---
        
        // ---=== eighteen article ===---
        
        $head_dish_1 = 'Праздничный салат "Селедка под шубой"';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(66);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(66);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Это очень простой рецепт селедки под шубой праздничной. Вам понравится и вкус, и текстура этого салата. Хотя, что уж тут говорить, все и так знают, какой это вкусный салатик. Попробуйте обязательно! ';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт селедки под шубой праздничной:'. 
'<br> - Сельдь соленая  — 1 Штука;
<br> - Лук  — 1 Штука;
<br> - Свекла  — 1 Штука;
<br> - Морковь  — 2 Штуки;
<br> - Картофель  — 2 Штуки;
<br> - Майонез  — 200 Грамм;
<br> - Соль  — По вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(18);
        
        $food_article_18 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_18 = $food_article_18->WriteInDatabase();
        
        // ---=== end eighteen article ===---
        
        // ---===  nineteen article ===---
        $head_dish_1 = 'Греческий салат с курицей и сухариками';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(67);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(67);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Интересный вариант традиционного греческого салата - греческий салат с курицей и сухариками. Ещё аппетитнее и сытнее!';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт греческого салата с курицей и сухариками:'. 
'<br> - Филе куриное - 200 г;
<br> - Брынза - 100 г;
<br> - Перец болгарский - 30 г;
<br> - Помидор - 1 шт.;
<br> - Огурец - 1 шт.;
<br> - Маслины - 50 г;
<br> - Хлеб белый - 20 г (1 кусочек);
<br> - Листья салата - 1-2 шт.;
<br> - Орегано сушеный - 3 щепотки;
<br> - Соль - по вкусу;
<br> - Масло оливковое - 40 мл.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(19);
        
        $food_article_19 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_19 = $food_article_19->WriteInDatabase();
        
        // ---=== end nineteen article ===---
        
        // ---=== twenty article ===---
        
        $head_dish_1 = 'Грибной салат с мясом';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(68);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(68);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Салат готовится из жареных грибов, жареного фарша, лука и салатных листьев. ';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт грибного салата с мясом:'. 
'<br> - Грибы шампиньоны (резаные ломтиками) - 230 г;
<br> - Фарш говяжий - 2 стакана;
<br> - Салат айсберг (порванные листья) - 230 г;
<br> - Лук красный (резаный соломкой) - 1 стакан;
<br> - Специи для мяса - 2 ч. л.;
<br> - Масло растительное;
<br> - Помидоры свежие (рубленые) - по желанию;
<br> - Сыры, смесь (измельченные на терке) - по желанию;
<br>Для заправки:
<br> - Кинза свежая (рубленая) - 2 ст. л.;
<br> - Уксус красный винный - 3 ст. л.;
<br> - Масло оливковое - 2 ст. л.;
<br> - Цедра лайма - 1 ч. л.;
<br> - Чеснок (измельченный) - 1 ч. л.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(20);
        
        $food_article_20 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_20 = $food_article_20->WriteInDatabase();
        
        // ---=== end twenty article ===---
        
        
        
        // ---=== twenty-one article ===---
        
        $head_dish_1 = 'Деревенский салат с грибами';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(69);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(69);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Постный, простой и вкусный, на скорую руку! Салат деревенский классический имеет несколько вариантов приготовления. Но мне больше по вкусу именно вариант с грибами и солеными огурцами. Он доступен по составу и достаточно прост в приготовлении. В зимнее время я готовлю этот салат достаточно часто!';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт деревенского салата с грибами:'. 
'<br> - Картофель (вареный) - 4-5 шт;
<br> - Огурцы (соленые) - 2-3 шт;
<br> - Грибы маринованные - 100 грамм;
<br> - Зеленый лук, укроп - небольшой пучок;
<br> - Растительное масло (нерафинированное) - 3-4 ст.л;
<br> - Черный молотый перец - по вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(21);
        
        $food_article_21 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_21 = $food_article_21->WriteInDatabase();
        
        // ---=== end twenty-one article  ===---
        
        
        // ---=== twenty two article ===---
        $head_dish_1 = 'Горячий салат с рыбой и ростками фасоли';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(70);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(70);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Этот горячий салат готовится из соленой красной рыбы, ростков фасоли и зеленого лука. Чеснок и соевый соус отлично дополняют этот салат.';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт горячего салата с рыбой и ростками фасоли:'. 
'<br> - Рыба красная, соленая (филе) - 100 г;
<br> - Ростки фасоли - 600 г.;
<br> - Лук зеленый - 2 шт.;
<br> - Чеснок (пропущенный через пресс) - 2 ст. л.;
<br> - Соус соевый легкий - 1 ст. л.;
<br> - Масло растительное - 60 г.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(22);
        
        $food_article_22 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_22 = $food_article_22->WriteInDatabase();
        
        // ---=== end twenty two article  ===---
        
        // ---=== twenty three article ===---
        $head_dish_1 = 'Салат из куриного филе, с капустой и бобами';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(71);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(71);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Салат готовится из китайской капусты, вареного куриного филе, консервированных садовых бобов и лука.';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт деревенского салата с грибами:'. 
'<br> - Куриное филе вареное (резаное кусочками) - 3 стакана (примерный по объему);
<br> - Капуста китайская (шинкованная) - 6 стаканов (примерно по объему);
<br> - Садовые бобы (фава) замороженные - 1,5 стакана;
<br> - Лук зеленый (резаный) - 4 шт.;
<br>Для заправки:
<br> - Уксус рисовый - 2/3 стакана;
<br> - Масло растительное - 2 ст. л.;
<br> - Мед - 3 ст. л.;
<br> - Паста васаби - 2 ч. л.;
<br> - Соль - 0,25 ч. л.;
<br> - Чеснок (измельченный) - 2 зубка.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(23);
        
        $food_article_23 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_23 = $food_article_23->WriteInDatabase();
        
        // ---=== end twenty three article  ===---
        
        // ---=== twenty four article ===---
        $head_dish_1 = 'Салат "Астория" из овощей и фруктов';
        $head_dish_2 = 'Состав блюда';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(72);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(72);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Салаты из свежих фруктов и овощей очень полезны. Предлагаем рецепт салата "Астория" из груш, грейпфрутов, болгарского перца и зелени.';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт салата "Астория":'. 
'<br> - Груши - 2 шт.;
<br> - Грейпфруты - 2 шт.;
<br> - Перец болгарский зелёный - 1 шт.;
<br> - Перец болгарский красный - 1 шт.;
<br> - Петрушка свежая - 0,5 пучка;
<br> - Уксус 5% - 2 ст. ложки;
<br> - Масло растительное - 4 ст. ложки;
<br> - Соль - 1 ч. ложка;
<br> - Перец черный молотый - 0,5 ч. ложки;
<br> - Орехи лесные (фундук) - 7-10 шт.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(24);
        
        $food_article_24 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_24 = $food_article_24->WriteInDatabase();
        
        // ---=== end twenty four article  ===---
        
        // ---=== twenty fife article ===---
        $head_dish_1 = 'Кубанское красное вино Каберне';
        $head_dish_2 = '';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(45);
        $photo_2 = null;
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Коллекция «Возрождение Легенды», Тихие вина, Сухое
Крымское Каберне Сухое – красное вино с красивым  рубиновым оттенком и тонами красных ягод в аромате пробудит аппетит, поможет расслабиться после тяжёлого рабочего дня.';
        $text_description_3 = '';
        $text_description_4 = '';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(25);
        
        $food_article_25 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_25 = $food_article_25->WriteInDatabase();
        
        // ---=== end twenty fife article  ===---
        
        // ---=== twenty six article ===---
        $head_dish_1 = 'Вино Chevalier de Bur Blanc Moelleux 0.75 л';
        $head_dish_2 = '';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(50);
        $photo_2 = null;
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = '"Chevalier de Bur" Blanc Moelleux — легкое белое полусладкое вино, изготовленное из белых сортов винограда. Когда виноград достиг оптимального уровня спелости и сахаристости, его собирают и бережно доставляют на винодельню. После мягкого прессования полученное сусло подвергается традиционной ферментации при контролируемой температуре. Вино отличается приятным, утонченным вкусом и ароматом с фруктово-цветочными тонами. Белое полусладкое вино "Шевалье де Бур" рекомендуется подавать к салатам, легким закускам, десертам и сырам.';
        $text_description_3 = '';
        $text_description_4 = '';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(26);
        
        $food_article_26 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_26 = $food_article_26->WriteInDatabase();
        
        // ---=== end twenty six article  ===---
        
        // ---=== twenty seven article ===---
        $head_dish_1 = 'Глинтвейн';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(51);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(51);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Холодными вечерами этот напиток наполнит дом теплом и уютом. Подавайте глинтвейн горячим!';
        $text_description_3 = '';
        $text_description_4 = 'Глинтвейн состоит из:'. 
'<br> - Вино красное сухое - 750 мл;
<br> - Апельсин - 1 шт.;
<br> - Яблоко зеленое - 1 шт.;
<br> - Бадьян - 3 шт.;
<br> - Кардамон - 6 шт.;
<br> - Гвоздика - 7 шт.;
<br> - Лавровый лист - 3 шт.;
<br> - Корица - 2 палочки;
<br> - Имбирь - 5 г;
<br> - Изюм - 10 шт.;
<br> - Лимонная трава - 1 шт.;
<br> - Мёд - 2 ст. ложки;
<br> - Чай черный заваренный - 150 мл;
<br> - Коньяк - 50 мл.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(27);
        
        $food_article_27 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_27 = $food_article_27->WriteInDatabase();
        
        // ---=== end twenty seven article  ===---
        
        // ---=== twenty eight article ===---
        $head_dish_1 = 'Чайный грог с пряностями';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(52);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(52);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Сегодня приготовим чайный грог с пряностями - напиток для взрослых, согревающий в холодное время года и дарящий хорошее настроение. Ещё бы, ведь в его составе присутствует алкоголь. :) Основой грога по этому рецепту является крепкий чай, который заваривается с гвоздикой и корицей, а затем смешивается с лимонным соком и ромом или коньяком. Получается очень ароматно!';
        $text_description_3 = '';
        $text_description_4 = 'Рецепт напитка:'. 
'<br> - Чай чёрный - 1 ст. ложка (6 г);
<br> - Вода - 500 мл;
<br> - Коньяк (или темный ром) - 50 мл;
<br> - Корица - 1 палочка;
<br> - Гвоздика - 2 бутона;
<br> - Лимон - 0,5 шт.;
<br> - Сахар (или мёд, или сахарный сироп) - по вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(28);
        
        $food_article_28 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_28 = $food_article_28->WriteInDatabase();
        
        // ---=== end twenty eight article  ===---
        
        // ---=== twenty nine article ===---
        $head_dish_1 = 'Морс клюквенный, брусничный, черносмородиновый или малиновый';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(53);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(53);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Вкусы клюквенного, брусничного, черносмородинового и малинового морсов значительно отличаются, но принцип приготовления для всех одинаковый. В качестве примера сегодня покажу, как готовить морс из малины. А вы можете приготовить морс из своих любимых ягод.';
        $text_description_3 = '';
        $text_description_4 = 'Состав морса:'. 
'<br> - Малина - 170 г.;
<br> - клюква - 125 г.;
<br> - брусника - 150 г.;
<br> - смородина чёрная - 150 г.;
<br> - Сахар - 120 г.;
<br> - Вода - 1 л.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(29);
        
        $food_article_29 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_29 = $food_article_29->WriteInDatabase();
        
        // ---=== end twenty nine article  ===---
        
        // ---=== thirty article ===---
        $head_dish_1 = 'Кофе латте по-домашнему';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(54);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(54);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Италию можно любить хотя бы только за то, что рецепт латте возник именно здесь. Он давно стал популярен во всем мире. Я обожаю именно такой кофе - напиток, состоящий из классического эспрессо и взбитого молока и часто готовлю кофе латте дома.';
        $text_description_3 = '';
        $text_description_4 = 'Состав кофе:'. 
'<br> - Кофе – 9 зерен;
<br> - Вода – 30 мл;
<br> - Молоко жирное (3,5%, домашнее) – 150 мл;
<br> - Сахар - по вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(30);
        
        $food_article_30 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_30 = $food_article_30->WriteInDatabase();
        
        // ---=== end thirty article  ===---
        
        // ---=== thirty one article ===---
        $head_dish_1 = 'Коктейль Мохито алкогольный';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(55);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(55);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Алкогольный коктейль "Мохито" - один из самых популярных напитков в жаркие летние дни. Коктейль "Мохито" готовится из доступных продуктов, поэтому его не сложно приготовить в домашних условиях. Мята, лайм, лимон, немного белого рома - и легкий, освежающий "Мохито" готов!';
        $text_description_3 = '';
        $text_description_4 = 'Состав мохито:
<br> - Ром белый – 80 мл.;
<br> - Тоник «Швепс» - 300-400 мл.;
<br> - Лайм – 1 шт.;
<br> - Лимон – 0,5-1 шт.;
<br> - Сахар коричневый – 1 ст. ложка;
<br> - Листья мяты – 12-14 шт.;
<br> - Лед – 10-12 кубиков;
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(31);
        
        $food_article_31 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_31 = $food_article_31->WriteInDatabase();
        
        // ---=== end thirty one article  ===---
        
        // ---=== thirty two article ===---
        $head_dish_1 = 'Ром Bacardi OakHeart Smoked Cinnamon 0.7 л';
        $head_dish_2 = '';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(56);
        $photo_2 = null;
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Bacardi "Oakheart" Smoked Cinnamon — новинка от компании Бакарди. При производстве этого премиального рома сначала создается базовый купаж из выдержанных ромов Bacardi. Затем продукт помещается в обожжённые бочки из белого американского дуба на 12 месяцев, где он приобретает ярко выраженные древесные тона и дымную нотку. На последней стадии выдержки добавляется экстракт корицы и коричневый сахар. В результате получается уникальный, мягкий, хорошо сбалансированный ром, который чудесно раскрывается в сочетании с колой.
<br> Компания Bacardi была основана в 1861 году виноторговцем Доном Факундо Бакарди, эмигрировавшим из Испании в Южную Америку. Он одним из первых решил придать этому грубому пиратскому напитку более мягкий и благородный вкус. В результате новой технологии производства и долгого подбора ингредиентов он получил ром высочайшего качества, который быстро завоевал признание во всем мире и подарил его компании звание Los Maestros del Ron — Мастера Рома.
<br> Основой непревзойденного качества рома Бакарди является уникальный процесс ферментации, дистилляции и фильтрации рома, а также искусная технология выдержки напитка в дубовых бочках. На сегодняшний день ром Бакарди обладает более 300 высшими наградами, что закрепило за ним звание "самого титулованного рома в мире".
';
        $text_description_3 = '';
        $text_description_4 = '';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(32);
        
        $food_article_32 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_32 = $food_article_32->WriteInDatabase();
        
        // ---=== end thirty two article  ===---
        
        // ---=== thirty three article ===---
        $head_dish_1 = 'Сок апельсиновый';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(57);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(57);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Небольшой набор продуктов, немного усилий, терпения - и у Вас на столе вкусный, свежий, натуральный и полезный апельсиновый сок, приготовленный в домашних условиях.';
        $text_description_3 = '';
        $text_description_4 = 'Состав напитка:
<br> - Апельсины свежие - 10 шт;
<br> - Сахар - 500 г.;
<br> - Лимонная кислота - 15 г.;
<br> - Вода холодная фильтрованная - 1,5 л.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(33);
        
        $food_article_33 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_33 = $food_article_33->WriteInDatabase();
        
        // ---=== end thirty three article  ===---
        
        // ---=== thirty four article ===---
        $head_dish_1 = 'Горячий шоколад с тыквенным соусом';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(46);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(46);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Очень приятный на вкус, мягкий, согревающий напиток с необычным дополнением - горячий шоколад с маршмэллоу и тыквенным соусом! Актуально для тыквенного сезона и не только!';
        $text_description_3 = '';
        $text_description_4 = 'Состав напитка:
<br> Для какао:
<br> - Какао-порошок - 1 ч. ложка;
<br> - Вода - 100 мл.;
<br> - Сливки - 100 мл.;
<br> - Шоколад - 20 г.;
<br> - Сахар - по вкусу.
<br> Для соуса:
<br> - Тыква (очищенная) - 130 г.;
<br> - Вода - 100 мл.;
<br> - Корица молотая - 1 щепотка;
<br> - Мускатный орех - на кончике ножа;
<br> - Кориандр молотый (по желанию) - по вкусу;
<br> - Сахар (по желанию) - по вкусу.
<br> Для подачи:
<br> - Маршмэллоу - по вкусу.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(34);
        
        $food_article_34 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_34 = $food_article_34->WriteInDatabase();
        
        // ---=== end thirty four article  ===---
        
        // ---=== thirty fife article ===---
        $head_dish_1 = 'Коктейль алкогольный "Красный грех"';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(47);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(47);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Этот фруктовый коктейль с шампанским подают на аперитив. И не зря он называется "Красный грех". Попробуйте и убедитесь в этом сами. Ведь невозможно не поддаться искушению и не выпить этот фруктовый коктейль еще раз.';
        $text_description_3 = '';
        $text_description_4 = 'Состав напитка:
<br> - Черносмородиновый ликер Creme de Cassis - 40 мл;
<br> - Апельсиновый сок - 10 мл;
<br> - Красное шампанское - 300-400 мл;
<br> - Лед - 5-6 куб.;
<br> - Сахар - 100 г.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(35);
        
        $food_article_35 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_35 = $food_article_35->WriteInDatabase();
        
        // ---=== end thirty fife article  ===---
        
        // ---=== thirty six article ===---
        $head_dish_1 = 'Коктейль "Любовь на пляже"';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(48);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(48);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Немного лета и солнца... Этот коктейль весьма популярен на морских курортах, как одно из лучших удовольствий после ...пляжа. :)';
        $text_description_3 = '';
        $text_description_4 = 'Cостав напитка:
<br> - Водка – 25 мл (1,5 ст. л.);
<br> - Персиковый шнапс – 25 мл (1,5 ст. л.);
<br> - Клюквенный сок – 75 мл (4,5 ст. л.);
<br> - Ананасовый сок – 75 мл (4,5 ст. л.).
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(36);
        
        $food_article_36 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_36 = $food_article_36->WriteInDatabase();
        
        // ---=== end thirty six article  ===---
        
        // ---=== thirty seven article ===---
        $head_dish_1 = 'Лимончелло';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(49);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(49);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Классический лимонный ликер "Лимончелло" (Limoncello), очень популярный в Италии, запросто можно приготовить самостоятельно в домашних условиях. Любителям сладких лимонных алкогольных напитков очень понравится приятный цитрусовый вкус лимончелло!';
        $text_description_3 = '';
        $text_description_4 = 'Cостав напитка:
<br> - Лимоны – 8-10 шт. (в зависимости от их размера)
<br> - Спирт 96% – 500 мл. или водка (качественная) - 750 мл.;
<br> - Вода питьевая – 650 мл. для спирта или 400 мл. для водки;
<br> - Сахар – 450 г. для спирта или 300 г. для водки.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(37);
        
        $food_article_37 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_37 = $food_article_37->WriteInDatabase();
        
        // ---=== end thirty seven article  ===---
        
        //десерты
        
        // ---=== thirty eight article ===---
        $head_dish_1 = 'Шоколадный торт с творожно-сметанным кремом';
        $head_dish_2 = 'Состав десерта';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(58);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(58);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Состав домашнего бисквитного тортика с творожным кремом для уютного семейного чаепития.';
        $text_description_3 = '';
        $text_description_4 = 'Состав торта:
<br> Для теста:
<br> - Молоко сгущённое - 400 г.;
<br> - Яйца - 2 шт.;
<br> - Какао-порошок - 2 ст. ложки;
<br> - Мука - 1 стакан (130 г);
<br> - Сода - 0,5 ч. ложки.
<br> - Соль - щепотка.
<br> Для крема:
<br> - Творог 9% - 250 г.;
<br> - Сметана жирностью 20% - 4 ст. ложки (100 г).;
<br> - Ванилин - щепотка;
<br> - Сахарная пудра - 4-5 ст. ложек.
<br> Для глазури:
<br> - Шоколад чёрный (или молочный) - 100 г.;
<br> - Сливки жирностью 15% (или молоко) - 50 мл.;
<br> - Ядра грецких орехов молотые - 3-4 ст. ложки;
<br> - Масло сливочное - 2 ч. ложки (для смазывания формы);
<br> - Мука - для обсыпки формы - 1 ст. ложки;
<br> - Сироп любой (или джем) для пропитки коржа - 150;
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(38);
        
        $food_article_38 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_38 = $food_article_38->WriteInDatabase();
        
        // ---=== end thirty eignt article  ===---
        
        // ---=== thirty nine article ===---
        $head_dish_1 = 'Панна котта';
        $head_dish_2 = 'Состав напитка';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(59);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(59);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Регион Италии - Эмилия-Романья.
Panna cotta - переводится как "вареные сливки". Этот десерт известен хорошо за пределами Италии.';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> - 500 г жирных сливок;
<br> - 1 стручок ванили;
<br> - 50 г сахара;
<br> - 2 листочка желатина;
<br> - карамельный сироп (или карамельный топинг) и свежие ягоды для украшения.
<br> Листочки желатина положить в воду для набухания. Сливки налить в кастрюлю. Вскрыть стручок ванили, содержимое вынуть и положить вместе со стручком в сливки. Добавить сахар, поставить на огонь. Вскипятить и варить на слабом огне 15 мин.
<br> Кастрюлю снять с огня, вынуть стручок ванили. Желатин положить в кастрюлю со сливками и растворить, помешивая. Сливки разложить в 4-6 небольших формочек и поставить в холодильник на 3-4 часа. Перед подачей формочки перевернуть, желе выложить на тарелку. Полить карамельным сиропом (или карамельным топингом)и украсить свежими ягодами.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(39);
        
        $food_article_39 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_39 = $food_article_39->WriteInDatabase();
        
        // ---=== end thirty nine article  ===---
        
        // ---=== forty article ===---
        $head_dish_1 = 'Творожно-банановый мусс';
        $head_dish_2 = 'Состав десерта';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(60);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(60);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Творожный мусс с бананами – вкусное лакомство. Его легко можно приготовить в домашних условиях. Десерт из творога и бананов получается пористым, воздушным и нежным. Рецепт его очень простой, можно делать такой творожно-банановый мусс на каждый день.';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> - Творог - 250 г.;
<br> - Бананы - 2 шт.;
<br> - Сметана - 2 ст. ложки;
<br> - Джем клубничный - 2 ст. ложки;
<br> - Кукурузные хлопья - 2-3 ст. ложки.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(40);
        
        $food_article_40 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_40 = $food_article_40->WriteInDatabase();
        
        // ---=== end forty article  ===---
        
        // ---=== forty one article ===---
        $head_dish_1 = 'Творожный мусс "Неженка"';
        $head_dish_2 = 'Состав десерта';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(61);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(61);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = '«Пища, не знающая запретов», «совершенный продукт», «природный концентрат полезных свойств молока», «наиболее мягкий продукт питания», «диета для всех» — так по всем статьям заслуженно характеризуют творог врачи и ученые. И я с этим полностью согласна. Люблю творог в любом виде. Но мусс "Неженка" - одно из самых любимых творожных "изысков".';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> На 3 креманки:
<br> - Творог мягкий - 250 гр.;
<br> - Сливки 200 мл.;
<br> - Ванильный сахар - 1/4 пачки;
<br> - Пачка желатина - 7 гр.;
<br> - Вода кипячёная холодная - 5 ст.л.;
<br> - Малина протертая я сахаром - 5 ч.л. (в творог);
<br> - Малина протертая с сахаром замороженная - 6 ч.л. ( на дно креманки).';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(41);
        
        $food_article_41 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_41 = $food_article_41->WriteInDatabase();
        
        // ---=== end forty one article  ===---
        
        // ---=== forty two article ===---
        $head_dish_1 = 'Десерт из творога, с малиной и печеньем';
        $head_dish_2 = 'Cостав десерта';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(62);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(62);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Десерт с творогом и малиной получается по-летнему ярким, сочным и ароматным. Такой десерт готовится просто и быстро, а главное - для его приготовления не потребуется включать духовку!';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> - Творог - 200 г.;
<br> - Малина свежая - 150-200 г.;
<br> - Печенье - 100 г.;
<br> - Сметана жирностью 15-20% - 4 ст. ложки (без горки);
<br> - Сахар - 2 ст. ложки (по вкусу);
<br> - Сахар ванильный - 1 ч. ложка;
<br> Для подачи (по желанию):
<br> - Мёд жидкий - 2 ч. ложки;
<br> - Шоколад белый - 10 г.;
<br> - Мята свежая - по вкусу.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(42);
        
        $food_article_42 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_42 = $food_article_42->WriteInDatabase();
        
        // ---=== end forty two article  ===---
        
        // ---=== forty three article ===---
        $head_dish_1 = 'Десерт "Павлова"';
        $head_dish_2 = 'Состав десерта';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(63);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(63);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Классический австралийский десерт, названный в честь русской балерины, – это взбитые сливки и фрукты на белоснежной французской меренге – хрупкой снаружи и мягкой внутри. Традиционно, этот нежный и изысканный десерт готовится с плодами маракуйи, клубникой или киви. Но в этом рецепте – абрикосы в сиропе и черная малина (выбирайте любые фрукты по своему вкусу и возможностям).';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> - Белок крупных яиц комнатной температуры – 4 шт.;
<br> - Соль – щепотка;
<br> - Уксус хересный – 2 ч. л.;
<br> - Кукурузный крахмал – 1 ч. л.;
<br> - Сахар мелкий – 1 стакан и 2 ст. л.;
<br> - Ванильный экстракт – 1 ч. л.;
<br> - Сливки жирные (для взбивания) – ¾ стакана;
<br> - Сахар – 2-3 ст. л.;
<br> - Абрикосы в сиропе (сварите абрикосы на малом огне в сиропе из воды и сахара (1:1) с добавлением кусочков лимонной цедры, имбиря, корицы и лимонного сока) – 1 стакан;
<br> - Свежая черная малина – ½ стакана.';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(43);
        
        $food_article_43 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_43 = $food_article_43->WriteInDatabase();
        
        // ---=== end forty three article  ===---
        
        // ---=== forty four article ===---
        $head_dish_1 = 'Десерт с шоколадным муссом';
        $head_dish_2 = 'Состав десерт';
        $name_autor = 'Иван Белоусов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(64);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(64);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я много работал поваром в зарубежных странах, у меня большой опыт, я люблю экспериментировать со своими блюдами придавая им необычный вкус, который вас удивит. Друзья пишите любые комментарии внизу страничке они очень важны для меня. ';
        $text_description_1 = '';
        $text_description_2 = 'Это необыкновенно нежный торт-десерт с шоколадом, маршмеллоу и взбитыми сливками.';
        $text_description_3 = '';
        $text_description_4 = 'Состав десерта:
<br> - Шоколад молочный (с миндалем) - 170 г.;
<br> - Маршмеллоу (воздушный зефир) - 16 шт. (или маленькие маршмеллоу - 1,5 стакана)
<br> - Молоко - 0,5 стакана;
<br> - Сливки взбитые - 2 стакана;
<br> Для коржа (диаметром 22 см):
<br> - Печенье-крекеры из цельнозерновой муки - 200-250 г.;
<br> - Сахар - 70 г.;
<br> - Масло сливочное растопленное - 6 ст. ложек.
';
        $dish_id = $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find(44);
        
        $food_article_44 = $singleFoods
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setDishId($dish_id);
        $food_article_44 = $food_article_44->WriteInDatabase();
        
        // ---=== end forty four article  ===---
        
        //$singleFoods
        debug('Всё записано статьи foods страница single');
        die();
    }
    //обновляем  статьи про еду
    public function updateDataSingleFoods(){
        $update_data = $this->entityManager->createQueryBuilder()
                ->select('t')
                ->from(TableWithDishDescriptionRestaurant::class,'t');
        $get_all_data = $update_data->getQuery()->getResult();
        $i=1;
        foreach($get_all_data as $one_object){
            
            $dish =  $this->entityManager->getRepository(DishInTheRestaurant::class)
                ->find($i);
            $one_object->setDishId($dish);
            $i++;
            $this->entityManager->persist($one_object);
        }
        
        //debug($get_all_data);
        //die();
        
        //$this->entityManager->flush();
        //debug('обновили');die();        
    }
    
    public function setDataSingleLifestyle(){
        //$singleFoods = new TableWithDishDescriptionRestaurantget($this->entityManager);
        $singleEvent = new TableWithEventDescriptionRestaurantget($this->entityManager);
        
        // ---=== first article ===---
        $head_dish_1 = 'Отмечаем 8 марта в ресторане';
        $head_dish_2 = 'День 8 марта в нашем ресторане';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(91);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(105);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'Поздравляем наших дам с международным женским днём !!! Наш ресторан сердечно поздравляет Вас с самым красивым и светлым весенним праздником - днем 8 Марта!
Природа наделила женщин несравненной красотой и неиссякаемой энергией, душевной нежностью и беззаветной преданностью, жизненной мудростью и удивительным терпением.
Вы храните семейный очаг, воспитываете детей, добиваетесь успехов в профессиональной и общественной деятельности, оставаясь при этом всегда молодыми и прекрасными.
В этот весенний день желаем Вам улыбок, замечательного праздничного настроения, семейного счастья, благополучия, здоровья Вам и Вашим близким!
Будьте всегда обаятельными, женственными и любимыми!';
        $text_description_3 = '';
        $text_description_4 = 'В нашем ресторане для милых дам приготовили комплимент в виде яркого десерта и букета цветов! Каждой представительнице прекрасного пола в подарок к любому заказу вынесут ягодный кейк, украшенный живыми цветами, а на входе подарят нежный букет. Наша команда  предложит попробовать новый коктейль. Фруктовый коктейль приготовлен на основе брюта и травяного ликера, а вкус мягко оттеняет сорбет манго-маракуйя – настоящая ода весне!';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(1);
        
        $event_article_1 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_1 = $event_article_1->WriteInDatabase();
        
        // ---=== end first article ===--- 
        
        // ---=== two article ===---
        $head_dish_1 = 'События в Субботу';
        $head_dish_2 = 'Субботние события';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(93);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(106);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'Мы приготовили Stand-Up Шоу-сюрприз с отличным тайным составом: доверьтесь и приготовьтесь удивляться! Для вас выступят три потрясающих комика, выбранных случайным образом!Вас ждет весёлый вечер от известных комиков — участников проектов «StandUp на ТНТ», «Вечерний Ургант», «Прожарка», Stand-up club #1, «22 комика» и др. В нашей команде более 50 комиков — только лучшие шутки и проверенная программа! Вам 100% будет смешно!';
        $text_description_3 = '';
        $text_description_4 = 'Помимо Stand-Up Шоу вы сможете насладиться прекрасным джаз концертом от московской группы музыкантов-импровизаторов Eliza’s Band, которые собрались вместе, чтобы играть любимую музыку в самых разных джазовых направлениях: зажигательный фанк, цепляющий за душу блюз, лирический smooth jazz, добрая традиция 20-х годов, огненный бибоп или все сразу. Джаз поможет настроиться на нужный лад перед шоу и окунуться в уникальную атмосферу вечера!';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(2);
        
        $event_article_2 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_2 = $event_article_2->WriteInDatabase();
        
        // ---=== end two article ===---
        
        // ---=== three article ===---
        $head_dish_1 = 'День Ресторана';
        $head_dish_2 = 'День Рождения Ресторана';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(102);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(94);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'В программе ― праздничное шоу, живая музыка, дискотека, яркие фото на память, вкусная еда, теплое общение, приятные сюрпризы, а также подарки для наших гостей. И, конечно же, ни одна вечеринка в честь дня рождения не обойдётся без праздничного торта! ';
        $text_description_3 = '';
        $text_description_4 = 'В этот день всем действуют скидки на все блюда 15%, а также один десерт (на столик) бесплатно, приходите будет весело и вкусно.';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(3);
        
        $event_article_3 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_3 = $event_article_3->WriteInDatabase();
        // ---=== end three article ===---
        // 
        // ---=== four article ===---
        $head_dish_1 = 'Отмечаем 23 февраля в ресторане';
        $head_dish_2 = 'День Защитника Отечества в нашем ресторане';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(89);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(90);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'С Днём защитника Отечества и хочу пожелать силы, мужества и отваги! Пусть каждый день будет успешным, каждый поступок — достойным, каждая идея — отличной, каждое слово — твёрдым, а каждое действие — уверенным. Желаю быть здоровым, любимым и непобедимым! Вас с Двадцать третьим февраля!';
        $text_description_3 = '';
        $text_description_4 = 'В этот замечательный день всем мужчинам действует скидка 25% на напитки, и 30% на алкогольные напитки.';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(4);
        
        $event_article_4 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_4 = $event_article_4->WriteInDatabase();
        
        // ---=== end four article ===---
        
        // ---=== five article ===---
        $head_dish_1 = 'Событие в Субботу вечером';
        $head_dish_2 = 'Концерт группы billy`s band';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(96);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(97);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'Для того, чтобы понять музыку биллисов нужно как минимум один раз побывать на их живом концерте. Только там вы ощутите мощную энергетику участников трио, а разгульные уличные вальсы и лирически-печальные блюзовые мотивы проберут до мурашек.
На концертах Billy`s band всегда много личного, философского и романтичного, а на серии концертов в честь юбилея группы, прозвучат редкие произведения, которые поклонники не слышали много лет!';
        $text_description_3 = '';
        $text_description_4 = 'Billy’s Band — российская музыкальная группа из Санкт-Петербурга, играющая в стилях блюз, свинг, джаз и рок.Основана в 2001 году Билли Новиком и Андреем Резниковым. Дискография Billy’s Band насчитывает 5 студийных, 3 концертных альбома, 3 сингла и несколько сборников; кроме того, в истории группы есть опыт участия в крупнейших фестивалях джазовой музыки в США и Канаде.
Сами музыканты характеризуют свой стиль как «романтический алкоджаз», ранее же называли себя «похоронным диксилендом с бесконечным хэппи-эндом». Один из немногих популярных коллективов в России, который относится к модели DIY (Do It Yourself) — команда сама записывает и оформляет альбомы, устраивает концерты и гастроли, при этом она не заключила ни одного контракта с крупным рекорд-лейблом или продюсером..';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(5);
        
        $event_article_5 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_5 = $event_article_5->WriteInDatabase();
        
        // ---=== end five article ===---
        
        // ---=== six article ===---
        $head_dish_1 = 'День города';
        $head_dish_2 = 'Отмечаем день города Москвы в нашем ресторане';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(98);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(99);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = '9 сентября Москва каждый год свой день рождения. Как всегда, День города будет отмечаться с размахом. Столичные заведения приглашают гостей отпраздновать этот день вместе. ';
        $text_description_3 = '';
        $text_description_4 = 'Друзья  8 и 9 сентября приглашаем в наш ресторан шумно и вкусно отметить чудесный праздник день рождения Москвы. Ресторан  подготовил вкусный сюрприз, в эти дни стейки будут стоить половину стоимости от основной цены!';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(6);
        
        $event_article_6 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_6 = $event_article_6->WriteInDatabase();
        
        // ---=== end six article ===---
        
        // ---=== seven article ===---
        $head_dish_1 = 'День народного единства';
        $head_dish_2 = 'Отмечаем день народного единства в нашем ресторане';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(95);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(100);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = '22 октября (1 ноября) 1612 года народное ополчение под предводительством Кузьмы Минина и Дмитрия Пожарского штурмом взяло Китай-город, гарнизон Речи Посполитой отступил в Кремль. Князь Пожарский вступил в Китай-город с Казанской иконой Божией Матери. 23 октября (2 ноября) командование гарнизона подписало капитуляцию, выпустив тогда же из Кремля московских бояр и других знатных лиц. На следующий день 24 октября (3 ноября) гарнизон сдался.
В 1649 году царь Алексей Михайлович распорядился отмечать день Казанской иконы Божией Матери не только летом, но и 22 октября (по юлианскому календарю), когда у него родился первенец Дмитрий Алексеевич. «Празднование Казанской иконе Божией Матери (в память избавления Москвы и России от поляков в 1612 году)» сохраняется в православном и народном календаре доныне.
В XX и XXI веках дню 22 октября по юлианскому календарю соответствует в григорианском календаре 4 ноября. Именно эта дата — 22 октября по юлианскому календарю, или 4 ноября по григорианскому календарю — выбрана в качестве дня государственного праздника.';
        $text_description_3 = '';
        $text_description_4 = 'В этот день в ресторане будут действовать скидка 30% на следующие блюда: шашлык, жаркое по-деревенски,рассыпчатый плов с курицей, рассольник, деревенский салат с грибами, десерт "Павлова".';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(7);
        
        $event_article_7 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_7 = $event_article_7->WriteInDatabase();
        
        // ---=== end seven article ===---
        
        // ---=== eight article ===---
        $head_dish_1 = 'Музыкальное шоу';
        $head_dish_2 = 'Музыкальное шоу';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(101);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(92);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'Этот день будет посвящён, народной, аккустической музыки. В этот день выступят более 20 исполнителей с разными жанрами. ';
        $text_description_3 = '';
        $text_description_4 = 'Те кто давно скучали по красивой, аккустической музыки приходите она вас удивит и погрузит в необычайную атмосферу. Поможет вам переключиться от повседневной суеты.';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(8);
        
        $event_article_8 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_8 = $event_article_8->WriteInDatabase();
        
        // ---=== end eight article ===---
        
        // ---=== nine article ===---
        $head_dish_1 = 'Открытое караоке';
        $head_dish_2 = 'Караоке в ресторане';
        $name_autor = 'Иван Степанов';
        $photo_1 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(103);
        $photo_2 = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(104);
        $photo_autora = $this->entityManager->getRepository(Photorestaurant::class)
                ->find(40);
        $text_autora = 'Приветствуя вас друзья! Я более 10 лет работаю организатором шумных мероприятий: вечеринок, корпоративов, различных клубных шоу. В организации мероприятий я стараюсь сделать так, чтобы никому не было скучно, чтобы оно было интересным и подходило разным группам с самыми разными взглядами, даже с противоречивыми интересами.';
        $text_description_1 = '';
        $text_description_2 = 'Интересные факты о караоке.
Согласно легенде, этот вид развлечения был изобретен в Японии еще в 70-x годах. По одной из версий, владелец бара нанял певца, но музыкант заболел. От отчаяния хозяин предложил спеть любому из посетителей: в итоге бар проработал всю ночь. Теперь поздний или даже круглосуточный режим работы считается привычным для ресторанов, где есть караоке.
В странах Азии очень распространен караоке-бокс. Это небольшая комната, в которой находится аппаратура для караоке. Друзья снимают помещение на определенное время, чтобы отдохнуть, попев любимые песни. В Москве многие рестораны с караоке предлагают аренду зала, тогда никто не сможет помешать дружеской атмосфере праздника или, как вариант пение в караоке в нашем ресторане в Москве.';
        $text_description_3 = '';
        $text_description_4 = 'В России караоке появилось только в 90-х годах. Ошибочно полагать, что такое развлечение подойдет исключительно любителям ретро и шансона. Наш рестораны с караоке предлагают обширные каталоги песен, среди которых вы наверняка найдете ту, что вам по духу.';
        $event_id = $this->entityManager->getRepository(EventsInTheRestaurant::class)
                ->find(9);
        
        $event_article_9 = $singleEvent
                ->setHeadDish1($head_dish_1)->setHeadDish2($head_dish_2)->setNameAutor($name_autor)
                ->setPhoto1($photo_1)->setPhoto2($photo_2)
                ->setPhotoAutor($photo_autora)->setTextAutora($text_autora)
                ->setTextDescription1($text_description_1)->setTextDescription2($text_description_2)
                ->setTextDescription3($text_description_3)->setTextDescription4($text_description_4)
                ->setEventId($event_id);
        $event_article_9 = $event_article_9->WriteInDatabase();
        
        // ---=== end nine article ===---
        
        
        
        
        debug('данные single event article записаны ');
    }
}
