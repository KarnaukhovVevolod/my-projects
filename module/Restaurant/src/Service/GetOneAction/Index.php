<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;

use Restaurant\Service\Interfaces\OneActionInterface;
//Entity
use Restaurant\Entity\TableAboutUsRestaurant;
use Restaurant\Entity\TableSideMenuRestaurant;
use Restaurant\Entity\DishInTheRestaurant;
use Restaurant\Entity\SortedKindsOfDishRestaurant;
use Restaurant\Entity\EventsInTheRestaurant;

/**
 * Description of Index
 *
 * @author Seva
 */
class Index implements OneActionInterface {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    public function getOneAction($data) {
        
        $today = new \DateTime();
        $today = $today->format('Y-m-d');
        $qb = $this->entityManager->createQueryBuilder();
        $data_index_query = $this->entityManager
                ->createQueryBuilder()
                
                //about start
                ->select('t_about AS t_about_us','phe','photo_human','photo_about','vid')
                ->from(TableAboutUsRestaurant::class,'t_about')
                ->leftjoin('t_about.photoHead','phe')
                ->leftjoin('t_about.photoHuman','photo_human')
                ->leftjoin('t_about.photoAbout','photo_about')
                ->leftjoin('t_about.video','vid')
                ->orderBy('t_about.id', 'DESC')
                //about end
                //foods start
                ->addSelect('food as food_','photo_food','typefood','categoryFood')
                ->from(DishInTheRestaurant::class,'food')
                ->leftjoin('food.photoForDish','photo_food')
                ->leftjoin('food.typeDish','typefood')
                ->leftjoin('typefood.typeDish','categoryFood')
                //->orderBy('food.typeDish')
                ->addOrderBy('food.thePopularityOfTheDish','DESC')
                //foods end
                //sorted category foods start
                ->addSelect('sort_category as category','category_food','photo_category2')
                ->from(SortedKindsOfDishRestaurant::class,'sort_category')
                ->leftjoin('sort_category.typeDish','category_food')
                ->leftjoin('sort_category.photo','photo_category2')
                //sorted category foods end
                //event start
                ->addSelect('event as event_','photo_event','date_event')
                ->from(EventsInTheRestaurant::class,'event')
                ->leftjoin('event.photoForEvents','photo_event')
                ->leftjoin('event.dateEvent','date_event')
                /*->where($qb->expr()->orX(
                        $qb->expr()->gte('date_event.date','?1'),
                        $qb->expr()->gte('date_event.date','?1'))
                        )*/
                //->setParameter('1',$today->format('Y-m-d'))
                //->setMaxResults(3)
                ->addOrderBy('event.id','DESC')
                //event end
                /*=== ---table side menu start--- ===*/
                ->addSelect('menu as side_menu','menu_photo1')
                ->from(TableSideMenuRestaurant::class,'menu')
                ->leftjoin('menu.photo','menu_photo1')
                ->where('menu.page = 3');
                //->orderBy('food.thePopularityOfTheDish','DESC');
                /*=== ---table side menu end--- ===*/
                //->setMaxResults(1);
             
        $data_index = $data_index_query->getQuery()->getArrayResult();
        //debug($data_index);
        
        $foods['scroll']=[];$foods['recipe']=[];$foods['different']=[];$count_foods = 0;
        $recipe_foods = 0; $dop_foods = 0;
        $event = [];$event_count = 0; $event_last = 0;$event_l = [];
        $side_menu = [];$category_foods = [];$about = [];
        
        foreach($data_index as $single)
        {
            if(isset($single['food_']))
            {
                if($count_foods < 3){
                    array_push($foods['scroll'], $single);
                }else{
                    if($single['food_']['recipe'] == 1 && $recipe_foods < 2)
                    {
                        array_push($foods['recipe'], $single); 
                        $recipe_foods++;
                    }
                    elseif($dop_foods < 5){
                        array_push($foods['different'], $single);
                        $dop_foods++;
                    }
                }
                $count_foods++;
            }
            elseif(isset ($single['event_'])){
                if($event_count < 3){
                    $date_single = $single['t_about_us']['dateEvent']['date']->format('Y-m-d');
                    if($date_single >= $today )
                    {
                        array_push($event, $single);
                        $event_count++;
                    }elseif($event_last < 3){
                        array_push($event_l, $single);
                        $event_last++;
                    }
                }
            }
            elseif(isset ($single['category'])){
                array_push($category_foods,$single);
            }
            elseif(isset ($single['t_about_us'])&& isset ($single['t_about_us']['title1'])){
                $about = $single;
            }
            elseif(isset ($single['side_menu'])){
                $side_menu = $single;
            }
        }
        if($event_count < 3){ //если мало будущих событий или их нет
            switch ($event_count){
                case 0:
                    $event = $event_l;
                    break;
                case 1:
                    $event[1] = $event_l[1];
                    $event[2] = $event_l[2];
                    break;
                case 2:
                    $event[2] = $event[2];
                    break;
                
            }
        }
        
        $data_result = $about['t_about_us'];
        $name = str_replace(' ','<br>',$data_result['nameHuman'] );
        $about['nameHuman1'] = $name;
        
        //sql - запросы в доктрине
        /*
        $sql_1 = 'SELECT * FROM events_in_the_restaurant LIMIT 3';
        $stm = $this->entityManager->getConnection()->prepare($sql_1);
        $stm->execute();
        $result1 = $stm->fetchAll();
        debug($result1);
        $sql_2 = 'SELECT * FROM events_in_the_restaurant where events_in_the_restaurant.id in (:status) LIMIT 2';
        $stm = $this->entityManager->getConnection()->prepare($sql_2);
        $stm->bindValue('status',7);
        $stm->execute();
        $result2 = $stm->fetchAll();
        debug($result2);
        
        $sql_3 = 'SELECT * FROM events_in_the_restaurant where events_in_the_restaurant.id in (:status)  LIMIT 2';
        $values = ['status'=> [5,6,7]];
        $types = ['status' => \Doctrine\DBAL\Connection::PARAM_INT_ARRAY];
        $stm = $this->entityManager->getConnection()->executeQuery($sql_3,$values,$types) //->prepare($sql_2);
        //$stm->bindValue('status',[5,6,7],['\Doctrine\DBAL\Connection::PARAM_INT_ARRAY']);
        //$stm->execute();
        ;
        $result3 = $stm->fetchAll();
        debug($result3);
        
        $sql_4 = 'SELECT * FROM events_in_the_restaurant where events_in_the_restaurant.id in (:status) and events_in_the_restaurant.event_name = :name_string LIMIT 3';
        $values = ['status'=> [5,6,7], 'name_string'=>'День города'];
        $types = ['status' => \Doctrine\DBAL\Connection::PARAM_INT_ARRAY, 'name_string'=> \PDO::PARAM_STR];
        $stm = $this->entityManager->getConnection()->executeQuery($sql_4,$values,$types);
        //$stm->bindValue('status',[5,6,7],\Doctrine\DBAL\Connection::PARAM_INT_ARRAY);
        //$stm->execute();
        ;
        $result4 = $stm->fetchAll();
        debug($result4);
        */
        $data__index = [$foods,$category_foods,$event,$about,$side_menu ];
        //debug($data__index);
        //debug($event_l);
        //die();
        return $data__index;
        
    }
}
