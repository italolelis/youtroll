<?php

class SignUpAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new SignUpForm();
            
            $this->controller->renderPartial('signUp', array('model' => $model), false, true);
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}