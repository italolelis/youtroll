<?php

class SingUpAction extends CAction
{

    public function run()
    {
        $singUpForm = new SingUpForm();
        $postSingUpForm = ApplicationHelper::getRequest('POST', 'SingUpForm');

        if (!empty($postSingUpForm)) {
            $singUpForm->attributes = $postSingUpForm;
            
            if($singUpForm->validate()) {
                $api = new PersistenceServer();
                return $api->connect('user/singUp', 'POST', array('username' => $this->username, 'password' => $this->password));
            }

        }
        
        $this->controller->render('singUp', array('singUpForm' => $singUpForm)); 
	
    }

}