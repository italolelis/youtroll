<?php

Yii::import('application.components.Controller');

class ReviewUserController extends Controller {

    public function init() {
        parent::init();

        $this->model = new ReviewUser();
    }

    public function actionView($id) {
        $this->model = ReviewUser::model()->getReviewUser($this->headers->Authorization[0], $id)->find();
                
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => false, 'message' => HApp::t('idUnknown')));
        }
        
        HApp::ajaxResponse(array('status' => true, 'model' => $this->model->attributes), $this->model->getAttributesPrefix());
    }
}