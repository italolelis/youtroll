<?php

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
//		ApplicationHelper::throwException(400, Yii::t('app', 'Desculpe, não foi possível enviar sua mensagem. Verifique se os campos foram preenchidos corretamente e tente novamente.'));
	    }

	    ApplicationHelper::ajaxResponse(true);
	}

	ApplicationHelper::throwException(403);
    }

}