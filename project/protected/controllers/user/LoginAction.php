<?php

class LoginAction extends CAction
{

    public function run()
    {
        if(Yii::app()->user->isGuest) {
            $model = new LoginForm();

            if (Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('login', array('model' => $model), false, true);
                Yii::app()->end();
            }
        
            $this->controller->render('login', array('model' => $model));
            Yii::app()->end();
        }
        
        HApp::throwException(401);
    }

}