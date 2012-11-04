<?php

class SendAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new SendPublicationForm();
            
            $this->controller->renderPartial('send', array('model' => $model), false, true);
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}