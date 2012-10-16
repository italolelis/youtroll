<?php

class SendImageAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
            $model = new LoginForm();
            $postModel = HApp::getRequest('POST', 'SendImageForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                
//                if($model->validate()) {
//                    HApp::ajaxResponse(array('action' => 'reload'));
//                }
//                
//                HModel::generatePerformAjaxValidation(get_class($model), $model->getAttributeListErrors(), HApp::t('invalidAccess'));
            }
            
	    HApp::throwException(400);
	}

	HApp::throwException(403);
    }

}