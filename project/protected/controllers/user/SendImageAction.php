<?php

class SendImageAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $this->controller->renderPartial('sendImage', null, false, true);
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}