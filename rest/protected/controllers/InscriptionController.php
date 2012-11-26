<?php

Yii::import('application.components.Controller');

class InscriptionController extends Controller {

    public function init() {
        parent::init();

        $this->model = new Inscription();
    }

    public function actionInsert() {
        if (Yii::app()->request->isPostRequest) {
            $idChannel = HApp::getRequest('POST', 'channel');
            $idUser = $this->headers->Authorization[0];
            
            if (!empty($idChannel) && !empty($idUser)) {
                $inscription = $this->model->getInscription($idChannel, $idUser)->find();
                
                if(!$inscription) {
                    $this->model->setOutPrefix($idChannel, 'channel');
                    $this->model->setOutPrefix($idUser, 'user');
            
                    if (!$this->model->save()) {
                        HApp::ajaxResponse($this->model->getErrors(), $this->model->getAttributesPrefix());
                    }
                }
                
                HApp::ajaxResponse(array('status' => true));
            }
        }
    }
}