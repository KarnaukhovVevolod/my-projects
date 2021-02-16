<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\AppObjectPull;
use Onemodule\designer_pattern\ObjectPull\UpdateObjectPull\UpdateObjectPull;
/**
 * Description of AppObjectPull
 *
 * @author Seva
 */
class AppObjectPull {
    //put your code here
    public function getpull(){
        $pull = new UpdateObjectPull();
        //class for pull 
        //Human, Country, Religion
        $pull->addObjectPull('Human', 'namehuman');
        $pull->addObjectPull('Country', 'country');
        $pull->addObjectPull('Religion', 'religion');
        
        $human = $pull->getObjectFromPull('namehuman');
        $country = $pull->getObjectFromPull('country');
        $religion = $pull->getObjectFromPull('religion');
        $human->setName('Seva');
        $human->setAge(25);
        $country->setCountry('Russia');
        
        $religion->setReligion("Православие");
        
        debug('шаблон проектирования object pull');
        debug('сами заполненные объекты');
        debug($human);
        debug($country);
        debug($religion);
        debug('сам пул объктов');
        debug($pull);
        //возвращаем объекты в пулл
        $pull->returnObjectInPull('namehuman');
        $pull->returnObjectInPull('country');
        $pull->returnObjectInPull('religion'); 
        debug($pull);
        //удаляем объекты из pull
        $pull->deleteObjectFromPull('namehuman');
        $pull->deleteObjectFromPull('country');
        $pull->deleteObjectFromPull('religion');
        debug($pull);
        debug($human);
        debug($country);
        debug($religion);
        
        die();
    }
    
    
}
