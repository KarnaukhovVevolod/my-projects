<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;

use Restaurant\Service\Interfaces\OneActionInterface;
use Restaurant\Entity\DishInTheRestaurant;
use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\TableSideMenuRestaurant;
use Restaurant\Entity\SortedKindsOfDishRestaurant;



/**
 * Description of Foods
 *
 * @author Seva
 */
class Foods implements OneActionInterface {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function getOneAction($data) 
    {
        $limit = 9;
        
        //debug($data);
        //die();
        
        //debug('param');
        //debug($data);
        $data_foods = $this->entityManager
                ->createQueryBuilder()
                ->select('s as p',
                        'fon as f','menu as m2','photo_fon','menu_photo','photo_s','categ_s')
                //->from(EventsInTheRestaurant::class,'e')
                ->from(SortedKindsOfDishRestaurant::class,'s')
                ->from(PhotoFonRestaurant::class,'fon')
                ->from(TableSideMenuRestaurant::class,'menu')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('fon.photo','photo_fon')
                ->leftjoin('menu.photo','menu_photo')
                ->leftjoin('s.photo','photo_s')
                ->leftjoin('s.typeDish','categ_s')
                ->where('fon.page = 2')
                ->where('menu.page = 2');
        
        $get_data_foods = $data_foods->getQuery()->getArrayResult();
        //debug($get_data_lifestyle);
        //debug('get_data_foods');
        //debug($get_data_foods);
        //die();
        $sort_type_foods = [];$photoFon = [];
        $sideMenu = [];
        foreach($get_data_foods as $data_foods)
        {
            if( isset($data_foods['p'])&&!isset($data_foods['f'])&&!isset($data_foods['m2'])){
                $new_sort = $data_foods['p'];
                $new_sort['photo'] = $data_foods['p']['photo']['photo'];
                $new_sort['typeEvent'] = $data_foods['p']['typeDish'];
                array_push($sort_type_foods, $new_sort);
            }elseif(isset($data_foods['f'])){
                $photoFon = $data_foods['f'];
                $photoFon['photo'] = $data_foods['p']['photo'];
            }elseif(isset($data_foods['m2'])) {
                $sideMenu = $data_foods['m2'];
                $sideMenu['photo'] = $data_foods['p']['photo']; 
            }
            
        }
        //die();
        //$all = [$sort_type_foods,$photoFon,$sideMenu];
        //debug('ALL');
        //debug($all);
        
        
        //--== пагинация данных ==--
        debug($data);
        //die();
        if( $data['sort'] == null ){//всех данных
            $all_data = $this->alldata($data,$limit);
            $foods_data = $all_data[0];
            $pages = $all_data[1];
            //debug('asdasdas');die();
        }else{ //для сортированной категории
            $all_data = $this->sortdata($data, $limit);
            $foods_data = $all_data[0];
            $pages = $all_data[1];
        }
        //--
        //debug('return_data');
        //die();
        $return_data = [$sort_type_foods, $photoFon, $sideMenu, $foods_data, $pages];
        //debug($return_data);
        //die();
        return $return_data;
    }
    
    /* --== разбивает пагинацию для всех данных ==-- */
    public function alldata($data, $limit){ 
        $all_data = $data;
        $data_id = $data['id']; 
        $data_id = str_replace('foods','',$data_id);
        $data_id = (int)$data_id;
        
        if($data_id == null){
            $data_id = 0;
        }else{
            $data_id = $data_id;
        }
        
        //поднимаем данные пагинации из базы
        $foods = $this->entityManager
                ->createQueryBuilder()
                ->select('d','photo','sortKindsOfDishRestaur',
                        'categoryFoodEventRestaur')
                ->from(DishInTheRestaurant::class,'d')
                ->leftjoin('d.photoForDish','photo')
                ->leftjoin('d.typeDish','sortKindsOfDishRestaur')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('sortKindsOfDishRestaur.typeDish', 'categoryFoodEventRestaur')
                ->orderBy('d.typeDish')
                ->setFirstResult($data_id)
                ->setMaxResults($limit);
        $foods__d = $foods->getQuery()->getArrayResult();         
        
        //считаем количество данных в базе (полный объём) 
        $count = $this->entityManager->createQueryBuilder()
                ->select('count(d.id) as r')
                ->from(DishInTheRestaurant::class,'d');
        $count_res = $count->getQuery()->getSingleScalarResult();
        $count_res = (int) $count_res;
        //формируем ссылки на страницы
        $number_of_page = ceil($count_res/$limit);
        //debug($number_of_page);
        $param_1 = 'foods';
        $pages = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1);
        //$pages = $this->algoritm_page(14, $limit,$data,3, $param_1);
        
        //debug($pages);
        //die();
        
        return [$foods__d ,$pages];
    }
    
    /* --== разбивает пагинацию сортированных данных ==-- */
    public function sortdata($data,$limit){
        $all_data = $data;
        $data_id = $data['id']; 
        $data_id = str_replace('foods','',$data_id);
        $data_id = (int) $data_id;
        $data_sort = $data['sort'];
        
        if($data_id == null){
            $data_id = 0;
        }else{
            $data_id = $data_id;
        }
        //debug($data_id);
        //debug($data_sort);
        //die();
        
        //поднимаем данные пагинации из базы
        
        $foods_sort = $this->entityManager
                //--
                ->createQueryBuilder()
                ->select('d','photo','sortKindsOfDishRestaur',
                        'categoryFoodEventRestaur')
                ->from(DishInTheRestaurant::class,'d')
                ->leftjoin('d.photoForDish','photo')
                ->leftjoin('d.typeDish','sortKindsOfDishRestaur')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('sortKindsOfDishRestaur.typeDish', 'categoryFoodEventRestaur')
                //->orderBy('e.id', 'DESC')
                ->orderBy('d.typeDish')
                ->where('sortKindsOfDishRestaur.linkSortedTypeDish = ?1')
                ->setParameter('1', $data_sort)
                ->setFirstResult($data_id)
                ->setMaxResults($limit);
                //--
                
        $foods__d_sort = $foods_sort->getQuery()->getArrayResult();
        //die();
        //считаем количество данных в базе (полный объём) 
        $count = $this->entityManager->createQueryBuilder()
                ->select('count(d.id) as r')
                ->from(DishInTheRestaurant::class,'d')
                ->leftjoin('d.typeDish','sortKindsOfDishRestaur')
                ->where('sortKindsOfDishRestaur.linkSortedTypeDish = ?1')
                ->setParameter('1', $data_sort);
        $count_res = $count->getQuery()->getSingleScalarResult();
        
        $count_res = (int) $count_res;
        //формируем ссылки на страницы
        $number_of_page = ceil($count_res/$limit);
        //debug($number_of_page);
        $param_1 = 'foods';
        $param_2 = '/'.$data_sort;
        $pages = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1,$param_2);
        //$pages = $this->algoritm_page(14, $limit,$data,3, $param_1);
        //$param_2 = "/holiday_event";
        //$pages2 = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1, $param_2);
        
        //debug($pages);
        //debug($pages2);
        //die();
        
        return [$foods__d_sort ,$pages];
    }
    
    /* --== сам алгоритм для пагинации  ==--*/
    public function algoritm_page($count_res, $limit, $data, $data_id, $param_1 = '', $param_2 = ''){
        $number_of_page = ceil($count_res/$limit);
        
        if( $number_of_page == 1 ){
            $page['page'] = 1;
        }
        elseif( $number_of_page == 2 ){
            $link_1 = str_replace('id/sort',$param_1.'0'.$param_2, $data['url']);
            $link_2 = str_replace('id/sort', $param_1.$limit.$param_2, $data['url']);
            $page['page'] = 2;
            $page['link'][0] = $link_1;
            $page['link'][1] = $link_2;
            if($data_id < $limit){
                $page['current_page'] = 1;
                
            }else{
                $page['current_page'] = 2;
            }
        }elseif( $number_of_page == 3 ){
            $link_1 = str_replace('id/sort',$param_1.'0'.$param_2, $data['url']);
            $link_2 = str_replace('id/sort', $param_1.$limit.$param_2, $data['url']);
            $to_limit = $limit*2;
            $link_3 = str_replace('id/sort', $param_1.$to_limit.$param_2, $data['url']);
            $page['page'] = 3;
            $page['link'][0] = $link_1;
            $page['link'][1] = $link_2;
            $page['link'][2] = $link_3;
            
            $t_limit = $to_limit - 1;
            if( $data_id == 0){
                $page['next'] = $link_2;
                $page['prev'] = null;
                $page['current_page'] = 1;}
            elseif($data_id == $to_limit){
                $page['current_page'] = 3;
                $page['next'] = null;
                $page['prev'] = $link_2;}
            elseif( $data_id == $limit ){
                $page['next'] = $link_3;
                $page['prev'] = $link_1;
                $page['current_page'] = 2;
            }
        }elseif( $number_of_page == 4 ){
            $link_1 = str_replace('id/sort',$param_1.'0'.$param_2, $data['url']);
            $link_2 = str_replace('id/sort', $param_1.$limit.$param_2, $data['url']);
            $to_limit = $limit*2;$free_limit = $limit*3; 
            $link_3 = str_replace('id/sort', $param_1.$to_limit.$param_2, $data['url']);
            $link_4 = str_replace('id/sort', $param_1.$free_limit.$param_2, $data['url']);
            $page['page'] = 4;
            $page['link'][0] = $link_1;
            $page['link'][1] = $link_2;
            $page['link'][2] = $link_3;
            $page['link'][3] = $link_4;
            $t_limit = $to_limit - 1;
            if( $data_id == 0){
                $page['next'] = $link_2;
                $page['prev'] = null;
                $page['current_page'] = 1;}
            elseif($data_id == $to_limit){
                $page['current_page'] = 3;
                $page['next'] = $link_4;
                $page['prev'] = $link_2;}
            elseif( $data_id == $limit ){
                $page['next'] = $link_3;
                $page['prev'] = $link_1;
                $page['current_page'] = 2;
            }
            elseif( $data_id == $free_limit ) {
                $page['next'] = null;
                $page['prev'] = $link_3;
                $page['current_page'] = 4;
            }
            
        }elseif( $number_of_page > 4 ){
            $link_start = str_replace('id/sort',$param_1.'0'.$param_2, $data['url']);
            $end_limit = $number_of_page*$limit - $limit;
            $link_end = str_replace('id/sort',$param_1.$end_limit.$param_2, $data['url']);
            $page['link']['start'] = $link_start;
            $page['link']['end'] = $link_end;
            $page['page'] = $number_of_page;
            //определяем где находится текущяя страница(на сколько близко к краю пагинации)
            if($data_id == 0){//в самом начале
                $page['link']['prev'] = null;
                $link_next = str_replace('id/sort',$param_1.$limit.$param_2, $data['url']);
                $link_ellipsis = 2*$limit;
                $page['link']['next'] = $link_next;
                $page['current_page'] = 1;
                $page['next_page'] = 2;
                $page['prev_page'] = null;
                $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                
            }elseif( $data_id == $end_limit ){//в самом конце
                $link_prev = $end_limit - $limit;
                $page['link']['prev'] = str_replace('id/sort',$param_1.$link_prev.$param_2, $data['url']);
                $link_ellipsis = $link_prev - $limit;
                $page['link']['next'] = null;
                $page['current_page'] = $number_of_page;
                $page['next_page'] = null;
                $page['prev_page'] = $number_of_page - 1;
                $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                
            }elseif( $data_id  == ($end_limit-$limit) ){//на предпоследней странице
                $link_prev = $end_limit - 2*$limit ;
                $page['link']['prev'] = str_replace('id/sort',$param_1.$link_prev.$param_2, $data['url']);
                $link_ellipsis = $link_prev - $limit;
                $page['link']['next'] = $link_end;
                $page['current_page'] = $number_of_page - 1;
                $page['next_page'] = null;
                $page['prev_page'] = $number_of_page - 2;
                $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                
            }elseif( $data_id  == ($end_limit-$limit-$limit) ){//если на предпредпоследней страницы
                $link_prev = $end_limit - 3*$limit ;
                $l_next = $end_limit - $limit;
                $page['link']['prev'] = str_replace('id/sort',$param_1.$link_prev.$param_2, $data['url']);
                //$link_ellipsis = $link_prev - $limit;
                $page['link']['next'] = str_replace('id/sort',$param_1.$l_next.$param_2, $data['url']);
                $page['current_page'] = $number_of_page - 2;
                $page['next_page'] = $number_of_page - 1;
                $page['prev_page'] = $number_of_page - 3;
                //$page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                if( $number_of_page == 5 ){
                    $page['link']['ellipsis'] = null;
                }else{
                    $link_ellipsis = $link_prev - $limit;
                    $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                }
            }elseif( $data_id == $limit ){//на второй странице
                $page['link']['prev'] = $link_start;
                $l_next = 2*$limit;
                $link_next = str_replace('id/sort',$param_1.$l_next.$param_2, $data['url']);
                $link_ellipsis = 3*$limit;
                $page['link']['next'] = $link_next;
                $page['current_page'] = 2;
                $page['next_page'] = 3;
                $page['prev_page'] = null;
                $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
            }elseif($data_id == 2*$limit){//на третьей странице
                $page['link']['prev'] = $link_start;
                $l_next = 3*$limit;
                $link_next = str_replace('id/sort',$param_1.$l_next.$param_2, $data['url']);
                $link_ellipsis = 3*$limit;
                $page['link']['next'] = $link_next;
                $page['current_page'] = 3;
                $page['next_page'] = 4;
                $page['prev_page'] = 2;
                $page['link']['prev'] = str_replace('id/sort',$param_1.$limit.$param_2, $data['url']);
                
                if( $number_of_page == 5 ){
                    $page['link']['ellipsis'] = null;
                }else{
                    $link_ellipsis = $l_next + $limit;
                    $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                }
                
            }else{//где-то в середине
                $link_prev = $data_id - $limit; 
                $page['link']['prev'] = str_replace('id/sort',$param_1.$link_prev.$param_2, $data['url']);
                $l_next = $data_id + $limit;
                $link_next = str_replace('id/sort',$param_1.$l_next.$param_2, $data['url']);
                if( $number_of_page == 5 ){
                    $page['link']['ellipsis'] = null;
                }else{
                    $link_ellipsis = $l_next + $limit;
                    $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                }
                $page['link']['next'] = $link_next;
                $page['current_page'] = $data_id/$limit + 1;
                $page['next_page'] = $page['current_page'] + 1;
                $page['prev_page'] = $page['current_page'] - 1;
                
                $page['link']['ellipsis'] = str_replace('id/sort',$param_1.$link_ellipsis.$param_2, $data['url']);
                
            }
            
        }
        return $page;
    }
    
    
    
    
}
