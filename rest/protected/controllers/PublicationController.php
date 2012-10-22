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
            $this->model->setAttributeWithoutPrefix($user->getAttributeWithoutPrefix('id'), 'owner');
            $this->model->setAttributeWithoutPrefix($user->channel->getAttributeWithoutPrefix('id'), 'channel');
            
            if (!$this->model->save()) {
                HApp::ajaxResponse($this->model->getErrors(), $this->model->getAttributesPrefix());
            }
            
            $tags = HConvert::stringToArrayTags(HApp::getRequest('POST', 'tags'));
            
            foreach ($tags as $tagName) {
                $tag = Tag::model()->getTagByName($tagName)->find();
                
                if(empty($tag)) {
                    $tag = new Tag();
                    $tag->setAttributeWithoutPrefix($tagName, 'name');
                    $tag->save();
                }
                
                $publicationTags = new PublicationTags();
                $publicationTags->setAttributeWithoutPrefix($this->model->getAttributeWithoutPrefix('id'), 'publication');
                $publicationTags->setAttributeWithoutPrefix($tag->getAttributeWithoutPrefix('id'), 'tag');
                $publicationTags->save();
            }
            
            HApp::ajaxResponse($this->model->getAttributeWithoutPrefix('id'));
        }
    }
    
    public function actionView($id) {
        $this->model = $this->model->findByPk($id);
        
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => 'error', 'message' => HApp::t('idUnknown')));
        }

        HApp::ajaxResponse(array('status' => 'true', 'model' => $this->model->attributes), $this->model->getAttributesPrefix());
    }
}