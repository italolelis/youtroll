<?php

Yii::import('application.components.PersistenceServer');

class Controller extends CController
{

    public $categories;

    public function init()
    {
        Yii::app()->setLanguage(in_array(Yii::app()->getRequest()->getPreferredLanguage(), Yii::app()->params['supportedLanguages']) ? Yii::app()->getRequest()->getPreferredLanguage() : Yii::app()->params['defaultLanguage']);
        Yii::app()->name = HApp::t('name');
        
        if ($this->route === 'site') {
            $this->categories = PersistenceServer::connect('category', 'GET');
        }
    }

}