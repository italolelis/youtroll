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
            
            $this->model->setAttributesWithoutPrefix($_POST);
            $this->model->setOutPrefix($user->getOutPrefix('id'), 'owner');
            $this->model->setOutPrefix($user->channel->getOutPrefix('id'), 'channel');
            
            if (!$this->model->save()) {
                HApp::ajaxResponse($this->model->getErrors(), $this->model->getAttributesPrefix());
            }
            
            $tags = HConvert::stringToArrayTags(HApp::getRequest('POST', 'tags'));
            
            foreach ($tags as $tagName) {
                $tag = Tag::model()->getTagByName($tagName)->find();
                
                if(empty($tag)) {
                    $tag = new Tag();
                    $tag->setOutPrefix($tagName, 'name');
                    $tag->save();
                }
                
                $publicationTags = new PublicationTags();
                $publicationTags->setOutPrefix($this->model->getOutPrefix('id'), 'publication');
                $publicationTags->setOutPrefix($tag->getOutPrefix('id'), 'tag');
                $publicationTags->save();
            }
            
            HApp::ajaxResponse($this->model->getOutPrefix('id'));
        }
    }
    
    public function actionView($id) {
        $this->model = $this->model->findByPk($id);
                
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => 'false', 'message' => HApp::t('idUnknown')));
        }

        $this->model->setOutPrefix($this->model->getOutPrefix('hits') + 1, 'hits');
        $this->model->update();
        
        $this->model->setOutPrefix(date(HApp::t('dateFormat'), strtotime($this->model->getOutPrefix('record'))), 'record');
        
        HApp::ajaxResponse(array('status' => 'true', 'model' => $this->model->attributes), $this->model->getAttributesPrefix());
    }
    
    public function actionUpdate() {
        $this->model = $this->model->findByPk(HApp::getRequest('PUT', 'id'));
        
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => 'false', 'message' => HApp::t('idUnknown')));
        }
        
        var_dump(HApp::getRequest('PUT', 'like'));
    }
}