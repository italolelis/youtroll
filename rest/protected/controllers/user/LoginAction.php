<?php

Yii::import('ext.several.BCrypt');

class LoginAction extends CAction
{

    public function run()
    {
        $return = 'false';
        
	if (Yii::app()->request->isPostRequest) {
            $user = $this->controller->model->getUserByUsername($this->controller->headers->Authorization[0])->find();
            
            if ($user) {
                if (BCrypt::check($this->controller->headers->Authorization[1], $user->usr_password)) {
                    $return = $user->getAttributeWithoutPrefix('id');
                }
            }

            HApp::ajaxResponse($return);
	}

	HApp::throwException(400);
    }

}