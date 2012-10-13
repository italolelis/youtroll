<?php

class ControlPanelAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $this->controller->renderPartial('controlPanel');
            Yii::app()->end();
        }
        
        HApp::throwException(403);
    }

}