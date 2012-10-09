<?php

class LoginAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new LoginForm();
            
            $this->controller->renderPartial('login', array('model' => $model), false, true);
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}