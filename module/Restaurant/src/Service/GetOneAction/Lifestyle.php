<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;

use Restaurant\Service\Interfaces\OneActionInterface;
use Restaurant\Entity\EventsInTheRestaurant;
use Restaurant\Entity\CategoryFoodsEventRestaurant;
use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\TableSideMenuRestaurant;
use Restaurant\Entity\SortedKindsOfEventsRestaurant;

/**
 * Description of Lifestyle
 *
 * @author Seva
 */
class Lifestyle implements OneActionInterface {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    /* --== Функция Получает все необходимые данные для страницы lifestyle ==--*/
    public function getOneAction($data) 
    {
        $limit = 2;
        
        $data_lifestyle = $this->entityManager
                ->createQueryBuilder()
                ->select('s as p',
                        'fon as f','menu as m2','photo_fon','menu_photo','photo_s','categ_s')
                //->from(EventsInTheRestaurant::class,'e')
                ->from(SortedKindsOfEventsRestaurant::class,'s')
                ->from(PhotoFonRestaurant::class,'fon')
                ->from(TableSideMenuRestaurant::class,'menu')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('fon.photo','photo_fon')
                ->leftjoin('menu.photo','menu_photo')
                ->leftjoin('s.photo','photo_s')
                ->leftjoin('s.typeEvent','categ_s')
                ->where('fon.page = 1')
                ->where('menu.page = 1');
        
        $get_data_lifestyle = $data_lifestyle->getQuery()->getArrayResult();
        //debug($get_data_lifestyle);
        
        //debug($data);
        if( $data['sort'] == null ){//всех данных
            $all_data = $this->alldata($data,$limit);
            $event_data = $all_data[0];
            $pages = $all_data[1];
            //debug('asdasdas');die();
        }else{ //для сортированной категории
            $all_data = $this->sortdata($data, $limit);
            $event_data = $all_data[0];
            $pages = $all_data[1];
        }
        
        
        $sort_type_event = [];$photoFon = [];
        $sideMenu = [];
        foreach($get_data_lifestyle as $data_lifestyle)
        {
            if( isset($data_lifestyle['p'])&&!isset($data_lifestyle['f'])&&!isset($data_lifestyle['m2'])){
                $new_sort = $data_lifestyle['p'];
                $new_sort['photo'] = $data_lifestyle['p']['photo']['photo'];
                $new_sort['typeEvent'] = $data_lifestyle['p']['typeEvent'];
                array_push($sort_type_event,$new_sort);
            }elseif(isset($data_lifestyle['f'])){
                $photoFon = $data_lifestyle['f'];
                $photoFon['photo'] = $data_lifestyle['p']['photo'];
            }elseif(isset($data_lifestyle['m2'])) {
                $sideMenu = $data_lifestyle['m2'];
                $sideMenu['photo'] = $data_lifestyle['p']['photo']; 
            }
            
        }
        
        
        
        $return_data = [$sort_type_event, $photoFon, $sideMenu, $event_data, $pages];
        
        return $return_data;        
        
    }
    /* --== разбивает пагинацию для всех данных ==-- */
    public function alldata($data,$limit){ 
        $all_data = $data;
        $data_id = $data['id']; 
        $data_id = str_replace('lifestyle','',$data_id);
        $data_id = (int)$data_id;
        
        if($data_id == null){
            $data_id = 0;
        }else{
            $data_id = $data_id;
        }
        
        //поднимаем данные пагинации из базы
        $life_style = $this->entityManager
                ->createQueryBuilder()
                ->select('e','photo','sortKindsOfEvenRestaur','dateEvent',
                        'categoryFoodEventRestaur')
                ->from(EventsInTheRestaurant::class,'e')
                ->leftjoin('e.photoForEvents','photo')
                ->leftjoin('e.typeEvent','sortKindsOfEvenRestaur')
                ->leftjoin('e.dateEvent','dateEvent')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('sortKindsOfEvenRestaur.typeEvent', 'categoryFoodEventRestaur')
                ->orderBy('e.id', 'DESC')
                ->setFirstResult($data_id)
                ->setMaxResults($limit);
        $life_style__d = $life_style->getQuery()->getArrayResult();         
        
        //считаем количество данных в базе (полный объём) 
        $count = $this->entityManager->createQueryBuilder()
                ->select('count(e.id) as r')
                ->from(EventsInTheRestaurant::class,'e');
        $count_res = $count->getQuery()->getSingleScalarResult();
        $count_res = (int) $count_res;
        //формируем ссылки на страницы
        $number_of_page = ceil($count_res/$limit);
        //debug($number_of_page);
        $param_1 = 'lifestyle';
        
        $pages = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1);
        //$pages = $this->algoritm_page(14, $limit,$data,3, $param_1);
        //$param_2 = "/holiday_event";
        //$pages2 = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1, $param_2);
        
        
        //debug($pages);
        //debug($pages2);
        //die();
        
        return [$life_style__d ,$pages];
    }
    
    /* --== разбивает пагинацию сортированных данных ==-- */
    public function sortdata($data,$limit){
        $all_data = $data;
        $data_id = $data['id']; 
        $data_id = str_replace('lifestyle','',$data_id);
        $data_id = (int)$data_id;
        $data_sort = $data['sort'];
        //debug($data_sort);die();
        
        if($data_id == null){
            $data_id = 0;
        }else{
            $data_id = $data_id;
        }
        
        //поднимаем данные пагинации из базы
        
        $life_style_sort = $this->entityManager
                ->createQueryBuilder()
                ->select('e','photo','sortKindsOfEvenRestaur','dateEvent',
                        'categoryFoodEventRestaur')
                ->from(EventsInTheRestaurant::class,'e')
                ->leftjoin('e.photoForEvents','photo')
                ->leftjoin('e.typeEvent','sortKindsOfEvenRestaur')
                ->leftjoin('e.dateEvent','dateEvent')
                //связи связанных таблиц с другими связанными таблицами
                ->leftjoin('sortKindsOfEvenRestaur.typeEvent', 'categoryFoodEventRestaur')
                ->where('sortKindsOfEvenRestaur.linkSortedTypeEvent = ?1')
                ->setParameter('1',$data_sort)
                ->orderBy('e.id', 'DESC')
                ->setFirstResult($data_id)
                ->setMaxResults($limit);
        $life_style__d_sort = $life_style_sort->getQuery()->getArrayResult();
        //debug('life_style__d_sort');
        //debug($life_style__d_sort);
                
        
        
        //считаем количество данных в базе (полный объём) 
        $count = $this->entityManager->createQueryBuilder()
                ->select('count(e.id) as r')
                ->from(EventsInTheRestaurant::class,'e')
                ->leftjoin('e.typeEvent','sortKindsOfEvenRestaur')
                ->where('sortKindsOfEvenRestaur.linkSortedTypeEvent = ?1')
                ->setParameter('1',$data_sort);
        $count_res = $count->getQuery()->getSingleScalarResult();
        //debug($count_res);
        //die();
        $count_res = (int) $count_res;
        //формируем ссылки на страницы
        $number_of_page = ceil($count_res/$limit);
        //debug($number_of_page);
        $param_1 = 'lifestyle';
        $param_2 = '/'.$data_sort;
        $pages = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1,$param_2);
        //$pages = $this->algoritm_page(14, $limit,$data,3, $param_1);
        //$param_2 = "/holiday_event";
        //$pages2 = $this->algoritm_page($count_res, $limit,$data,$data_id, $param_1, $param_2);
        
        
        //debug($pages);
        //debug($pages2);
        //die();
        
        return [$life_style__d_sort ,$pages];
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
