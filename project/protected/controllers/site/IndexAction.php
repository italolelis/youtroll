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
        
        $see = HApp::getRequest('GET', 'view');
        
        if(!empty($see)) {
            $idPublication = HSecurity::urlDecode($see);
            
            $publication = PersistenceServer::connect("publication/$idPublication", 'GET');
            
            if($publication->status) {
                $owner = PersistenceServer::connect("user/{$publication->model->owner}", 'GET');
                
                if($owner->status) {
                    $this->controller->render('//publication/view', array('publication' => $publication->model, 'owner' => $owner->model));
                    Yii::app()->end();
                }
            }
            
            HApp::throwException(404);
        }
        
        $this->controller->render('index');
    }

}