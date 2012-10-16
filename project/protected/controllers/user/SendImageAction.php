<?php

class SendImageAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new SendImageForm();
            
            $this->controller->renderPartial('sendImage', array('model' => $model), false, true);
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}