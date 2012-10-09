<?php

class IndexAction extends CAction
{

    public function run()
    {
        if (strpos(Yii::app()->request->getRequestUri(), 'site') !== false || strpos(Yii::app()->request->getRequestUri(), 'index') !== false) {
	    HApp::throwException(404);
	}
        
        if (Yii::app()->request->isAjaxRequest) {
	    $this->controller->renderPartial('index', null, false, true);
	    Yii::app()->end();
	}
        
	if (Yii::app()->user->hasState('errorMessage')) {
	    Yii::app()->user->setFlash('error', Yii::app()->user->getState('errorMessage'));
	    Yii::app()->user->setState('errorMessage', null);
	}
        
        $this->controller->render('index');
    }

}