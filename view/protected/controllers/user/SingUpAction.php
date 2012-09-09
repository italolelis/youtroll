<?php

class SingUpAction extends CAction
{

    public function run()
    {
        $singUpForm = new SingUpForm();
        $this->controller->render('sing-up',array('singUpForm'=>$singUpForm)); 
	
    }

}