<?php

class SignUpAction extends CAction
{

    public function run()
    {
        if(Yii::app()->user->isGuest) {
            $model = new SignUpForm();

            if (Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('signUp', array('model' => $model), false, true);
                Yii::app()->end();
            }
        
            $this->controller->render('signUp', array('model' => $model));
        }
        
        HApp::throwException(401);
    }

}