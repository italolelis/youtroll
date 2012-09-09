<?php

Yii::import('application.components.PersistenceServer');

class LoginAction extends CAction
{

    public function run()
    {
        $postLoginForm = ApplicationHelper::getRequest('POST', 'LoginForm');

        if (!empty($postLoginForm)) {
            $loginForm = new LoginForm();
            $loginForm->attributes = $postLoginForm;

            $response = $loginForm->validate();

            if ($loginForm->hasErrors()) {
                ApplicationHelper::ajaxResponse($loginForm->getErrors());
            }

            $return = array("redirect" => Yii::app()->createAbsoluteUrl('site'));
            
            ApplicationHelper::ajaxResponse($return);
        }

        ApplicationHelper::throwException(403);
    }

}