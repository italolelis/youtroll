<?php

class LoadViewAction extends CAction
{

    public function run()
    {
        $view = HApp::getRequest('PARAM', 'view');

        if (!empty($view)) {
            if(Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial($view, null, false, true);
                Yii::app()->end();
            }
            
            $this->controller->render($view);
            Yii::app()->end();
        }

        HApp::throwException(403);
    }

}