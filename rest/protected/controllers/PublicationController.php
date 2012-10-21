<?php

Yii::import('application.components.Controller');

class PublicationController extends Controller {

    public function init() {
        parent::init();

        $this->model = new Publication();
    }

    public function actionInsert() {
        if (Yii::app()->request->isPostRequest) {
            $user = User::model()->findByPk($this->headers->Authorization[0]);
            
            var_dump($user->channel->attributes);
            exit();
            $this->model->setAttributesWithoutPrefix($_POST);
            foreach ($user->publications as $key => $value) {
                var_dump($value);
            }exit();
            $this->model->setAttributeWithoutPrefix($user->getAttributeWithoutPrefix('id'), 'owner');
            $this->model->setAttributeWithoutPrefix($user->channel->getAttributeWithoutPrefix('id'), 'channel');
            
            if (!$this->model->save()) {
                HApp::ajaxResponse($this->model->getErrors(), $this->model->getAttributesPrefix());
            }
            
            HApp::ajaxResponse('true');
        }
    }
}