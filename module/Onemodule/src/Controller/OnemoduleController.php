<?php


namespace Onemodule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail;
use Laminas\Math\Rand;

use Onemodule\Form\UserForm;
use Onemodule\designer_pattern\Delegation\AppHuman;
use Onemodule\designer_pattern\Abstractfactory\AppContinentCountry;

use Onemodule\designer_pattern\Singleton\AppSingleton;
use Onemodule\designer_pattern\Strategyfactory\UseAlgorithms\UseAlgorithms;
use Onemodule\designer_pattern\Multiton\Multiton_pull\Multiton_pull;
use Onemodule\designer_pattern\Multiton\Multiton_pull\Multiton_pull_next;
use Onemodule\designer_pattern\Builder_pattern\AppBuilder;
use Onemodule\designer_pattern\Clone_\AppClone\AppClone;
use Onemodule\designer_pattern\ObjectPull\AppObjectPull\AppObjectPull;
use Onemodule\designer_pattern\Adapter\AppAdapter\AppAdapter;
use Onemodule\designer_pattern\Facade\AppFacade\Facade;
use Onemodule\designer_pattern\Bridge\AppBridge\BridgeApp;


class OnemoduleController extends AbstractActionController {
    //put your code here
    
    public function indexAction()
    {
        $data = 'hello';
        //echo $data;
        //die();
        if($this->getRequest()->isPost())
        {
            $read_form = $this->params()->fromPost();
            //print_r($read_form);
            debug($read_form);
            die();
        }
        $form = new UserForm();
        $viewModel = new ViewModel([
            'form'=>$form
        ]);
        //die();
        return $viewModel;
        //return new ViewModel();
        //return 1;
    }
    
    public function oneAction()
    {
        $data = 'New Module';
        return new ViewModel();
    }
    
    public function patterndelegirovaniyAction()
    {
        //шаблон делегирования
        /*
        $human = new AppHuman();
        
        $human->setName('seva');
        $human->setSurname('karnaukhov');
        $human->setYers('25');
        $human->setTelephone('89165769458');
        $human->setGender('men');
        debug($human); 
        $data = $human->getDatahuman();
        debug($data);
        
        $human = new AppHuman();
        $human->toBlack();
        $human->setName('seva');
        $human->setSurname('karnaukhov');
        $human->setYers('25');
        $human->setTelephone('89165769458');
        $human->setGender('men');
        debug($human); 
        $data = $human->getDatahuman();
        debug($data);
        die();
        */
        //Шаблон Абстрактной фабрики
        $continent = new AppContinentCountry();
        //1 - Евразия, 2 - Африка, 3 - Австралия, 4 - Северная Америка
        $info_continent = $continent->setContinent(4);
        
        debug($info_continent);
        
        /*Фабрицный метод*/
        $info_country = $continent->setCountry(1);
        debug($info_country);
        /*Статический метод  (когда управление происходит через один метод класса
         *  static)*/
        $info_country_static = $continent->setStaticCountry(2);
        debug('статический метод фабрики');
        debug($info_country_static);
        debug('простая фабрика');
        $info_country_simple = $continent->setSipmleCountry(1);
        debug($info_country_simple);
        /*singleton - простой способ (с подводными камнями)
         *  позволяет в приложении один раз создавать экземпляр класса,
         * чтобы не перегружать память приложения */
        /*простой singleton*/
        /*
        debug('singleton');
        $singletone = SingletonSimple::getInstance();
        $singletone->setTest('первый экземпляр');
        debug($singletone->getTest());
        $singletone2 = SingletonSimple::getInstance();
        debug($singletone2->getTest());
        $result = $singletone === $singletone2;
        debug($result);
         * *
         */
        
        $app_singletone = new AppSingleton();
        /*простой singleton*/
        $app_singletone->checkoutSimpleSingleton();
        /*продвинутый singleton*/
        $app_singletone->checkoutAdvancedSingleton();
        
        /*шаблон стратегия (поведенческий)*/
        debug('strategy');
        $pattern_strategy = new UseAlgorithms();
        $result = $pattern_strategy->computation(20, 30, 1);
        debug($result);
        $result = $pattern_strategy->computation(20, 30, 2);
        debug($result);
        $result = $pattern_strategy->computation(20, 30, 3);
        debug($result);
        $result = $pattern_strategy->computation(20, 30, 4);
        debug($result);
        
        //шаблон multiton, pull - одиночек 
        /*тоже самое что и singleton, только можно создавать копии с другим именем*/
        $multiton_pull_one = Multiton_pull::getInstance('mysql');//создали первый экземпляр
        $multiton_pull_too = Multiton_pull::getInstance('monodb');//создали второй экземпляр
        
        $multiton_pull_one_1 = Multiton_pull::getInstance('mysql');//вызываем первый экземпляр
        $multiton_pull_too_1 = Multiton_pull::getInstance('monodb');//вызываем второй экземпляр
        $result_multiton_1 = $multiton_pull_one === $multiton_pull_one_1;
        $result_multiton_2 = $multiton_pull_too === $multiton_pull_too_1;
        $result_multiton_3 = $multiton_pull_one === $multiton_pull_too;
        debug('multiton');
        debug($result_multiton_1);
        debug($result_multiton_2);
        debug($result_multiton_3);
        /* новый наследованный класс от Multiton_pull  */
        $new_multiton = Multiton_pull_next::getInstance('mysql');
        debug('new Multiton');
        $result_new_multiton = $new_multiton === $multiton_pull_one_1; //не идентичный
        debug($result_new_multiton);
        //$pull_one = $m
        /*порождающие шаблоны. шаблон строитель*/ 
        $builder = new AppBuilder();
        $builder->check_build();
        
        
        /*порождающие шаблоны. шаблон клонирования объекта*/
        //$app_clone = new AppClone();
        //$app_clone->appHuman();
        /*порождающие шаблоны. шаблон object pull */
        //$object_pull = new AppObjectPull();
        //$object_pull->getpull();
        
        /* структурный шаблон. шаблон адаптер */
        /* позволяет адаптировать классы с другим интерфейсом */
        //$app_animals = new AppAdapter();
        //$app_animals->App();
        /*структурный шаблон. шаблон facade */
        
        //$facade_ = new Facade();
        //$facade_->facade_function('Добавить классы');
        /* структурный шаблон. шаблон мост. позволяте разделить 
         * редактирование абстракций от реализаций */
        $bridge = new BridgeApp();
        $bridge->app();
        debug('Пока Всё');
        die();
        return new ViewModel();
    }
    
    
}
