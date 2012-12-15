<?php

class SendAction extends CAction
{

    public function run()
    {
        if(!Yii::app()->user->isGuest) {
            $model = new SendPublicationForm();

            if (Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('send', array('model' => $model), false, true);
                Yii::app()->end();
            }
        
            $this->controller->render('send', array('model' => $model));
            Yii::app()->end();
        }
        
        HApp::throwException(401);
    }

}