<?php

Yii::import('application.components.PersistenceServer');

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
                
                $return = $api->connect('user', 'POST', array(
                    'usr_username' => $singUpForm->username,
                    'usr_password' => $singUpForm->password,
                    'usr_email' => $singUpForm->email,
                ));
            }

        }
        
        $this->controller->render('singUp', array('singUpForm' => $singUpForm)); 
	
    }

}