<?php

class SignUpAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
            $model = new SignUpForm();
            $postModel = HApp::getRequest('POST', 'SignUpForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                
                if($model->validate()) {
                    $response = PersistenceServer::connect('user', 'POST', $model->attributes);
                    
                    if($response === true) {
                        HApp::ajaxResponse(array(
                            'action' => 'openMenuOption',
                            'menuOption' => 'login',
                            'message' => array('type' => 'success', 'text' => HApp::t('signUpDone')),
                        ));
                    }
                    
                    $model->addErrors($response);
                    
                    HModel::generatePerformAjaxErrors($model);
                }
                
                HModel::performAjaxValidation($model);
            }
            
            HApp::throwException(400);
        }
        
        HApp::throwException(403);
    }

}