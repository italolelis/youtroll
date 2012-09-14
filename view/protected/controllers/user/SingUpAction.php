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
                
            }

        }
        
        $this->controller->render('singUp', array('singUpForm' => $singUpForm)); 
	
    }

}