<?php

class SearchAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
            $model = new SearchForm();
            $postModel = HApp::getRequest('POST', 'SearchForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                if ($model->validate()) {                
                    HApp::ajaxResponse(array('action' => 'redirect', 'link' => Yii::app()->createAbsoluteUrl("search/{$postModel['search']}")));
                }
                
                HApp::ajaxResponse(array('action' => 'inputFocus', 'input' => 'SearchForm_search'));
            }
            
	    HApp::throwException(400);
	}

	HApp::throwException(403);
    }

}