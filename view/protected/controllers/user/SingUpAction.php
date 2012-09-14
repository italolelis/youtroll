<?php

class SingUpAction extends CAction
{

    public function run()
    {
        $singUpForm = new SingUpForm();
        $this->controller->render('singUp', array('singUpForm' => $singUpForm)); 
	
    }

}