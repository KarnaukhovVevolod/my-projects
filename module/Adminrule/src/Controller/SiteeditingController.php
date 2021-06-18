<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Restaurant\Service\GetAllDataController\GetAllDataController;
use Restaurant\Form\ContactForm;
use Adminrule\Form\SiteEditing\EditingForm;

/**
 * Description of SiteeditingController
 *
 * @author Seva
 */
class SiteeditingController extends AbstractActionController {
    //put your code here
    
    private $entityManager;
    
    private $getalldata;
    private $editManager;
    
    
    public function __construct($entityManager, $editManager) {
        $this->entityManager = $entityManager;
        $this->getalldata = new GetAllDataController($entityManager);
        $this->editManager = $editManager;
    }
    
    public function onDispatch(\Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        $this->layout()->setTemplate('layout/layout3');
    }
    
    public function contactAction()
    {
        $action = $this->url()->fromRoute('restaurant',['action'=>'contact']);
        $contact_form = new ContactForm($action);
        
        //$fileName = __DIR__.'/../../../../public/images/31-min.jpeg';
        //if(file_exists($fileName)){
        //    debug('Нашёл');
        //}
        //else{
        //    debug('Не нашёл');
        //}
        //die();
        $data_action_contact = $this->getalldata->getDataAction('contact');
        $action_cont['action'] = 'contact';
        $edite_data = $this->editManager->GetDataAction($action_cont);
        //debug($edite_data);
        $action = $this->url()->fromRoute('siteediting',['action'=>'all-form']);
        $action_img = $this->url()->fromRoute('siteediting',['action'=>'image-form']);
        $form_fon = new EditingForm('fon-form', 'fon', $action);
        $form_image = new EditingForm('image-form', 'image', $action_img);
        $form_contact = new EditingForm('contact-form', 'contact', $action);
        
        return new ViewModel(['data_action'=>$data_action_contact, 'contact_form'=>$contact_form,'edite' =>$edite_data,
                'form_fon'=>$form_fon,'form_image'=>$form_image, 'form_contact'=>$form_contact]);

    }
    public function allFormAction()
    {
        
        if( $this->getRequest()->isPost() )
        {
            $data = $this->params()->fromPost();
            $action = $this->url()->fromRoute('siteediting',['action'=>'all-form']);
            
            $ajax_data = 'ajax work';
            $ajax_data = $data['table_update'];
            //обрабатываем данные с формы
            $new_data['form'] = $data;
            $new_data['action'] = $action;
            $ajax_data = $this->editManager->ProcessingForm($new_data);
            
            $response = $this->getResponse();
            $response->setContent(\Zend\Json\Json::encode($ajax_data));
            return $response;
        }
    }
    
    public function imageFormAction()
    {
        
        if( $this->getRequest()->isPost() ){
            $data = array_merge_recursive(
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray());
            $action_img = $this->url()->fromRoute('siteediting',['action'=>'image-form']);
            //обрабатываем данные с формы
            $data['action_img'] = $action_img;
            $new_data['form'] = $data;
            $new_data['action'] = $action_img;
            $ajax_data = $this->editManager->ProcessingForm($new_data);
            //$ajax_data = $data;
            $response = $this->getResponse();
            $response->setContent(\Zend\Json\Json::encode($ajax_data));
            return $response;
        }
        
    }
    
    
    
}
