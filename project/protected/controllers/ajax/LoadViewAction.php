<?php

class LoadViewAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
	    $name = HApp::getRequest('POST', 'name');
	    $controller = HApp::getRequest('POST', 'controller');
	    $params = HApp::getRequest('POST', 'params');

	    if (!empty($name)) {
		if (!empty($controller)) {
		    $this->controller->redirect(array($controller . '/' . $name));
		}
                
                if(!empty($params)) {
                    if(!empty($params['category'])) {
                        Category::getIDByKeyName($params['category']);
                    }
                }
                
		$this->controller->renderPartial($name, null, false, true);
		Yii::app()->end();
	    }

	    HApp::throwException(403);
	}

	HApp::throwException(400);
    }

}