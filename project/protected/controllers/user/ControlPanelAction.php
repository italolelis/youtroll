<?php

class ControlPanelAction extends CAction
{

    public function run()
    {
        if(!Yii::app()->user->isGuest) {
            if (Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('controlPanel');
                Yii::app()->end();
            }
        
            $this->controller->render('controlPanel');
            Yii::app()->end();
        }
        
        HApp::throwException(401);
    }

}