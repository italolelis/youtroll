<?php

class IndexAction extends CAction {

	public function run() {
		$modelLogin  = new LoginForm();
		
		$loginForm = ApplicationHelper::getRequest('POST', 'LoginForm');
		
		if(!is_null($loginForm)) {
			$modelLogin->attributes = $loginForm;
			$modelLogin->validate();
		}
		
		$this->controller->render('index', array('modelLogin' => $modelLogin));
	}

}