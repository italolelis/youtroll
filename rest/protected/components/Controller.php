<?php

class Controller extends CController
{

    public $headers;
    public $model;
    
    public function init()
    {
        $this->headers = HConvert::arrayToObject(apache_request_headers());

        if(isSet($this->headers->Authorization)) {
            $this->headers->Authorization = explode(':', base64_decode(substr($this->headers->Authorization, 6)));
        }
        
	Yii::app()->setLanguage(in_array(Yii::app()->getRequest()->getPreferredLanguage(), Yii::app()->params['supportedLanguages']) ? Yii::app()->getRequest()->getPreferredLanguage() : Yii::app()->params['defaultLanguage']);
        Yii::app()->name = HApp::t('name');
    }

}