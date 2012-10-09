<?php

class LoadViewAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
	    $name = HApp::getRequest('POST', 'name');
	    $controller = HApp::getRequest('POST', 'controller');

	    if (!empty($name)) {
		if (!empty($controller)) {
		    $this->controller->redirect(array($controller . '/' . $name));
		}

		$this->controller->renderPartial($name);
		Yii::app()->end();
	    }

	    HApp::throwException(403);
	}

	HApp::throwException(400);
    }

}