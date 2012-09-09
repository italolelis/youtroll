<?php

Yii::import('application.components.PersistenceServer');

class LoginAction extends CAction
{

    public function run()
    {
        $postLoginForm = ApplicationHelper::getRequest('POST', 'LoginForm');

	if(!empty($postLoginForm)) {
	    $loginForm = new LoginForm();
	    $loginForm->attributes = $postLoginForm;
            
	    $loginForm->validate();

	    if($loginForm->hasErrors()) {
                ApplicationHelper::ajaxResponse($loginForm->getErrors());
	    }

	    ApplicationHelper::ajaxResponse(true);
	}

	ApplicationHelper::throwException(403);
    }

}