<?php

Yii::import('application.components.PersistenceServer');

class SingUpAction extends CAction
{
    private $_prefix = 'usr_';

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
                
                if($return === true) {
                    Yii::app()->user->setFlash('success', __('singUpFinish', 'texts'));
                    
                    $this->controller->redirect(Yii::app()->baseUrl);
                }
                
                foreach ($singUpForm->attributes as $k => $v) {
                    $param = $this->_prefix.$k;

                    if($return->$param !== null) {
                        foreach ($return->$param as $errorMessage) {
                            $singUpForm->addError($k, $errorMessage);
                        }
                    }
                }
            }

        }
        
        $this->controller->render('singUp', array('singUpForm' => $singUpForm)); 
	
    }

}