<?php

Yii::import('application.components.Controller');

class PublicationController extends Controller {

    public function init() {
        parent::init();

        $this->model = new Publication();
    }

    public function actionList() {
        $order = HApp::getRequest('GET', 'scope') ?: 'noScope';
        $limit = HApp::getRequest('GET', 'limit');
        
        switch ($order) {
            case 'related':
                $publications = array();
                $idsPublications = array();
                $idPublication = HApp::getRequest('GET', 'publication');
                
                $publicationsTags = PublicationTag::model()->getPublicationsRelated($idPublication)->rand()->limit($limit)->findAll();
                
                foreach($publicationsTags as $publicationTag)
                {
                    $idsPublications[] = $publicationTag->publication->getOutPrefix('id');
                    $publications[] = $publicationTag->publication->attributes;
                }
                
                $totalPublicationsMissing = $limit - count($publications);
                
                if($totalPublicationsMissing > 0) {
                    $additionalPublications = Publication::model()->rand()->limit($totalPublicationsMissing)->findAll('pbct_id <> :pbct_id AND pbct_id NOT IN (:ids_publications)', array(':pbct_id' => $idPublication, ':ids_publications' => implode(', ', $idsPublications)));
                    
                    foreach($additionalPublications as $additionalPublication)
                    {
                        $publications[] = $additionalPublication->attributes;
                    }
                }
                
                HApp::ajaxResponse($publications, $this->model->getAttributesPrefix());
            default:
                HApp::ajaxResponse($this->model->$order()->limit($limit)->findAll(), $this->model->getAttributesPrefix());
        }
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
                
                $publicationTag = new PublicationTag();
                $publicationTag->setOutPrefix($this->model->getOutPrefix('id'), 'publication');
                $publicationTag->setOutPrefix($tag->getOutPrefix('id'), 'tag');
                $publicationTag->save();
            }
            
            HApp::ajaxResponse($this->model->getOutPrefix('id'));
        }
    }
    
    public function actionView($id) {
        $this->model = $this->model->findByPk($id);
                
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => false, 'message' => HApp::t('idUnknown')));
        }

        $this->model->setOutPrefix($this->model->getOutPrefix('hits') + 1, 'hits');
        $this->model->update();
        
        $this->model->setOutPrefix(date(HApp::t('dateTimeFormat'), strtotime($this->model->getOutPrefix('record'))), 'record');
        $this->model->setOutPrefix(date(HApp::t('dateTimeFormat'), strtotime($this->model->getOutPrefix('record'))), 'record');
        
        $likes = (int) $this->model->likes;
        $unlikes = (int) $this->model->unlikes;
        
        HApp::ajaxResponse(array('status' => true, 'model' => $this->model->attributes, 'stats' => array('likes' => $likes, 'unlikes' => $unlikes)), $this->model->getAttributesPrefix());
    }
    
    public function actionUpdate() {
        $this->model = $this->model->findByPk(HApp::getRequest('PUT', 'id'));
        
        if (!$this->model) {
            HApp::ajaxResponse(array('status' => false, 'message' => HApp::t('idUnknown')));
        }
        
        $like = HApp::getRequest('PUT', 'like');
        
        if(!is_null($like)) {
            $reviewUser = ReviewUser::model()->getReviewUser($this->headers->Authorization[0], $this->model->getOutPrefix('id'))->find();
            
            if($reviewUser) {
                $reviewUser->setOutPrefix($like === $reviewUser->getOutPrefix('like') ? null : $like, 'like');
                $reviewUser->update();
            } else {
                $reviewUser = new ReviewUser();
                $reviewUser->setOutPrefix($this->headers->Authorization[0], 'user');
                $reviewUser->setOutPrefix($this->model->getOutPrefix('id'), 'publication');
                $reviewUser->setOutPrefix($like, 'like');
                $reviewUser->save();
            }
            
            $reviewUser->setOutPrefix(is_null($reviewUser->getOutPrefix('like')) ? null : (boolean) $reviewUser->getOutPrefix('like'), 'like');
            
            HApp::ajaxResponse(array('status' => true, 'model' => $reviewUser->attributes), $reviewUser->getAttributesPrefix());
        }
        
        HApp::ajaxResponse(array('status' => true));
    }
}