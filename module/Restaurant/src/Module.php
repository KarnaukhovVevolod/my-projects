<?php


namespace Restaurant;
/**
 * Description of Module
 *
 * @author Seva
 */
class Module {
    //put your code here
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }
    
}
