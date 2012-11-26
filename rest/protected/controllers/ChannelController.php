<?php

Yii::import('application.components.Controller');

class ChannelController extends Controller {

    public function init() {
        parent::init();

        $this->model = new Channel();
    }
    
    public function actionView($id) {
        $this->model = $this->model->findByPk($id);
                
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => false, 'message' => HApp::t('idUnknown')));
        }
        
        HApp::ajaxResponse(array('status' => true, 'model' => $this->model->attributes), $this->model->getAttributesPrefix());
    }
}