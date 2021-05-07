<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;

use Restaurant\Service\Interfaces\OneActionInterface;
use Restaurant\Entity\TableWithDishDescriptionRestaurant;
use Restaurant\Entity\SortedKindsOfDishRestaurant;
use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\DishInTheRestaurant;


use Restaurant\Entity\CommentDishRestaurant;

use Restaurant\Entity\TableWithEventDescriptionRestaurant;
use Restaurant\Entity\CommentEventRestaurant;
use Restaurant\Entity\EventsInTheRestaurant;
use Restaurant\Entity\SortedKindsOfEventsRestaurant;


/**
 * Description of Single
 *
 * @author Seva
 */
class Single implements OneActionInterface{
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    /* --== Функция получает все необходимые данные для страницы single ==--*/
    public function getOneAction($data) {
        
        $data_sort = $data['sort'];
        
        if( $data_sort == 'foods' ){
            $result_data = $this->getSingleFoods($data);
        }else{
            $result_data = $this->getSingleEvent($data);
        }
        return $result_data;
        
    }
    //получает статьи для еды
    public function getSingleFoods($data){
        $id_foods = str_replace('i','',$data['id']);
        $id_foods = (int) $id_foods;
        if( $id_foods > 0 ){
            
            $qb = $this->entityManager->createQueryBuilder();
            /*
            $data_single_f = $this->entityManager->createQueryBuilder()
                    ->select('d','t','dish')
                    ->from(DishInTheRestaurant::class,'d')
                    ->from(TableWithDishDescriptionRestaurant::class,'t')
                    ->where($qb->expr()->eq('t.id','?1'))
                    ->leftjoin('t.dishId','dish')
                    ->andWhere('d.typeDish=dish.typeDish')
                    ->andWhere('d.id=?2')
                    
                    ->setParameter('2',1)
                    ->setParameter('1',$id_foods)
                    ;
            $get_f = $data_single_f->getQuery()->getArrayResult();
             * *
             */
            /**/
            
            $data_single_foods = $this->entityManager->createQueryBuilder()
                    ->select('t','s as s1','fon as f1','photo_fon','type','dish' /*,'dish1'*/ ,'d as d1','photo1',
                            'photo2','photo_autor','photoDish'/*,'com_dish as comDish',*/ /*'com_on_dish as comOnDish',*/
                            /*'com_photo','com_date',*/ /*,'com_on_photo','com_on_date'*/ /*, 'com_on_on_comment','com_on_on_comment_photo','com_on_on_comment_date'*/)
                    ->addSelect('commentall','photo_com','date_com','commentonall', 'photo_com_on', 'date_com_on')
                    ->from(TableWithDishDescriptionRestaurant::class,'t')
                    ->from(PhotoFonRestaurant::class,'fon')
                    ->from(SortedKindsOfDishRestaurant::class,'s')
                    ->from(DishInTheRestaurant::class,'d')
                    //comments
                    ->leftjoin('t.commentAll', 'commentall')
                    ->leftjoin('commentall.photoUser', 'photo_com')
                    ->leftjoin('commentall.dateMessage','date_com')
                    ->leftjoin('commentall.commentDish','commentonall')
                    ->leftjoin('commentonall.photoUser','photo_com_on')
                    ->leftjoin('commentonall.dateMessage', 'date_com_on')
                    //end comments
                    
                    //->leftjoin(CommentDishRestaurant::class,'com_dish','with','t.id = com_dish.idDescriptionDish')
                    //->leftjoin('com_dish.photoUser','com_photo')
                    //->leftjoin('com_dish.dateMessage','com_date')
                    //->leftjoin('com_dish.commentDish','com_on_on_comment' )
                    //->leftjoin('com_on_on_comment.photoUser','com_on_on_comment_photo')
                    //->leftjoin('com_on_on_comment.dateMessage','com_on_on_comment_date')
                    
                    ->leftjoin('fon.photo', 'photo_fon')
                    ->leftjoin('s.typeDish', 'type')
                    ->leftjoin('t.photo1','photo1')
                    ->leftjoin('t.photo2','photo2')
                    ->leftjoin('t.photoAutor','photo_autor')
                    //->from($fon_dql_1)//->where('t.id = ?1')//->where($qb->expr()->andX($qb->expr()->eq('t.id','?1'),$qb->expr()->exists($fon_dql_1)) )//->where($qb->expr()->andX($qb->expr()->eq('t.id','?1'),$qb->expr()->any($fon_dql_1)) )
                    //->where($qb->expr()->between('t.id','?1','?1'))//->where($qb->expr()->not($qb->expr()->eq('t.id','?1')))//->andWhere($qb->expr()->exists($fon_dql_1))//->expr()->all($fon_dql_1)
                    
                    //связь Dish id
                    ->leftjoin('t.dishId','dish')
                    ->leftjoin('d.photoForDish','photoDish')
                    ->where($qb->expr()->eq('t.id','?1'))
                    ->andWhere($qb->expr()->eq('fon.page','4'))
                    ->andWhere('d.typeDish=dish.typeDish')
                    ->setParameter('1',$id_foods)
                    ;
            
            //debug($data_single_foods->getDql());
            //$data_single_foods->setMaxResults(4);
            //debug($data_single_foods->getDql());
            //die();
            //debug($data_single_foods->getDql());
            $get_data_single_foods = $data_single_foods->getQuery()->getArrayResult();
            //debug($get_data_single_foods);
            
            //die();
        }
        else{
            return null;
        }
        //debug($get_data_single_foods);
        
        $article = [];$fon = [];$category = [];$d_product = [];$index_product;$i=0;
        //$comment = [];
        
        //die();
        foreach($get_data_single_foods as $single_foods){
            if(isset($single_foods['f1']) || isset($single_foods['s1']) || isset($single_foods['d1'])){
                if(isset($single_foods['s1'])){
                    array_push($category, $single_foods);
                }elseif(isset($single_foods['d1'])){
                    
                    if($article['dishId']['id'] == $single_foods['d1']['id']){
                        $index_product = $i; 
                    }else{
                        $sing = $single_foods['d1'];
                        $sing[0] = $single_foods[0];
                        array_push($d_product, $sing);
                    }
                    $i++;
                }else{
                    $fon = $single_foods[0]['photo']['photo'];
                }
            
            }
            else{
                $article = $single_foods[0];
            }
        }
        //обработка продуктов для рекомендации
        
        $d_product_1;
        //debug($d_product);
        //debug($index_product);
        //debug($i);
        //die();
        $max_index_product = $i - 2;
        if($max_index_product > 3){
            if($index_product > $max_index_product){
                $d_product_1[0] = $d_product[0];
            }else{
                $d_product_1[0] = $d_product[$index_product];
            }
            if( ($index_product + 1 ) > $max_index_product ){
                $var = $index_product - $max_index_product;
                $d_product_1[1] = $d_product[$var];
            }else{
                $var = $index_product + 1;
                $d_product_1[1] = $d_product[$var];
            }
            if( ( $index_product - 1 ) < 0 ){
                $d_product_1[2] = $d_product[$max_index_product];
            }else{
                $var = $index_product - 1;
                $d_product_1[2] = $d_product[$var];
            }
            if( ($index_product - 2) < 0 ){
                $var = $index_product - 1;
                $var = $max_index_product - $var;
                $d_product_1[3] = $d_product[$var];
            }else{
                $var = $index_product - 2;
                $d_product_1[3] = $d_product[$var];
            }
            
        }else{
            $d_product_1 = $d_product;
        }
        
        $page = 'Еда';
        return [$fon, $category, $article, $d_product_1, $page];
        
    }
    
    //получает статьи для событий
    public function getSingleEvent($data){
        //$data_single_events = $this->entityManager->createQueryBuilder();
        //$get_data_single_events = $data_single_events->getQuery()->getArrayResult();
        $id_events = str_replace('i','',$data['id']);
        $id_events = (int) $id_events;
        if( $id_events > 0 ){
            
            $qb = $this->entityManager->createQueryBuilder();
            $data_single_events = $this->entityManager->createQueryBuilder()
                    ->select('t','s as s1','fon as f1','photo_fon','type','event','e as e1','photo1',
                            'photo2','photo_autor','photoEvents','dateEvent')
                    ->addSelect('commentall','photo_com','date_com','commentonall','photo_com_on','date_com_on')
                    
                    ->from(TableWithEventDescriptionRestaurant::class,'t')
                    ->from(PhotoFonRestaurant::class,'fon')
                    ->from(SortedKindsOfEventsRestaurant::class,'s')
                    ->from(EventsInTheRestaurant::class,'e')
                    //comments
                    ->leftjoin('t.commentAll', 'commentall')
                    ->leftjoin('commentall.photoUser', 'photo_com')
                    ->leftjoin('commentall.dateMessage','date_com')
                    ->leftjoin('commentall.commentonEvent','commentonall')
                    ->leftjoin('commentonall.photoUser','photo_com_on')
                    ->leftjoin('commentonall.dateMessage', 'date_com_on')
                    //end comments
                    ->leftjoin('fon.photo', 'photo_fon')
                    ->leftjoin('s.typeEvent', 'type')
                    ->leftjoin('t.photo1','photo1')
                    ->leftjoin('t.photo2','photo2')
                    ->leftjoin('t.photoAutor','photo_autor')
                    //->from($fon_dql_1)//->where('t.id = ?1')//->where($qb->expr()->andX($qb->expr()->eq('t.id','?1'),$qb->expr()->exists($fon_dql_1)) )//->where($qb->expr()->andX($qb->expr()->eq('t.id','?1'),$qb->expr()->any($fon_dql_1)) )
                    //->where($qb->expr()->between('t.id','?1','?1'))//->where($qb->expr()->not($qb->expr()->eq('t.id','?1')))//->andWhere($qb->expr()->exists($fon_dql_1))//->expr()->all($fon_dql_1)
                    
                    //связь Event id
                    ->leftjoin('t.eventId','event')
                    ->leftjoin('e.photoForEvents','photoEvents')
                    ->leftjoin('e.dateEvent','dateEvent')
                    ->where($qb->expr()->eq('t.id','?1'))
                    ->andWhere($qb->expr()->eq('fon.page','5'))
                    ->andWhere('e.typeEvent=event.typeEvent')
                    ->setParameter('1',$id_events)
                    ;
            $get_data_single_events = $data_single_events->getQuery()->getArrayResult();
            //debug($get_data_single_events);
            //die();
            
        }
        else{
            return null;
        }
        //debug($get_data_single_foods);
        
        $article = [];$fon = [];$category = [];$d_product = [];$index_product;$i=0;
        //$comment = [];
        
        //die();
        foreach($get_data_single_events as $single_events){
            if(isset($single_events['f1']) || isset($single_events['s1']) || isset($single_events['e1'])){
                if(isset($single_events['s1'])){
                    array_push($category, $single_events);
                }elseif(isset($single_events['e1'])){
                    
                    if($article['eventId']['id'] == $single_events['e1']['id']){
                        $index_product = $i; 
                    }else{
                        $sing = $single_events['e1'];
                        $sing[0] = $single_events[0];
                        array_push($d_product, $sing);
                    }
                    $i++;
                }else{
                    $fon = $single_events[0]['photo']['photo'];
                }
            
            }
            else{
                $article = $single_events[0];
            }
        }
        //обработка продуктов для рекомендации
        
        $d_product_1;
        //debug($d_product);
        //debug($index_product);
        //debug($i);
        //die();
        $max_index_product = $i - 2;
        if($max_index_product > 3){
            if($index_product > $max_index_product){
                $d_product_1[0] = $d_product[0];
            }else{
                $d_product_1[0] = $d_product[$index_product];
            }
            if( ($index_product + 1 ) > $max_index_product ){
                $var = $index_product - $max_index_product;
                $d_product_1[1] = $d_product[$var];
            }else{
                $var = $index_product + 1;
                $d_product_1[1] = $d_product[$var];
            }
            if( ( $index_product - 1 ) < 0 ){
                $d_product_1[2] = $d_product[$max_index_product];
            }else{
                $var = $index_product - 1;
                $d_product_1[2] = $d_product[$var];
            }
            if( ($index_product - 2) < 0 ){
                $var = $index_product - 1;
                $var = $max_index_product - $var;
                $d_product_1[3] = $d_product[$var];
            }else{
                $var = $index_product - 2;
                $d_product_1[3] = $d_product[$var];
            }
            
        }else{
            $d_product_1 = $d_product;
        }
        
        $page = 'События';
        return [$fon, $category, $article, $d_product_1, $page];
        
        
    }
    
    
}
