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
            $this->model->setOutPrefix($user->getAttributeWithoutPrefix('id'), 'owner');
            $this->model->setOutPrefix($user->channel->getAttributeWithoutPrefix('id'), 'channel');
            
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
                $publicationTags->setOutPrefix($this->model->getAttributeWithoutPrefix('id'), 'publication');
                $publicationTags->setOutPrefix($tag->getAttributeWithoutPrefix('id'), 'tag');
                $publicationTags->save();
            }
            
            HApp::ajaxResponse($this->model->getAttributeWithoutPrefix('id'));
        }
    }
    
    public function actionView($id) {
        $this->model = $this->model->findByPk($id);
                
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => 'false', 'message' => HApp::t('idUnknown')));
        }

        $this->model->setOutPrefix($this->model->getAttributeWithoutPrefix('hits') + 1, 'hits');
        $this->model->update();
        
        $this->model->setOutPrefix(date(HApp::t('dateFormat'), strtotime($this->model->getAttributeWithoutPrefix('record'))), 'record');
        
        HApp::ajaxResponse(array('status' => 'true', 'model' => $this->model->attributes), $this->model->getAttributesPrefix());
    }
}