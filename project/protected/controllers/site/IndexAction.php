<?php

class IndexAction extends CAction
{

    public function run()
    {
        if (strpos(Yii::app()->request->getRequestUri(), 'site') !== false || strpos(Yii::app()->request->getRequestUri(), 'index') !== false) {
	    HApp::throwException(404);
	}

        $model = new SearchForm();
        
        $recentPublications = PersistenceServer::connect('publication', 'GET', array('scope' => 'recent', 'limit' => Yii::app()->params['maxPublications']));
        $mostViewedPublications = PersistenceServer::connect('publication', 'GET', array('scope' => 'hits', 'limit' => Yii::app()->params['maxPublications']));
        $popularPublications = PersistenceServer::connect('publication', 'GET', array('scope' => 'popular', 'limit' => Yii::app()->params['maxPublications']));
        $lessViewedPublications = PersistenceServer::connect('publication', 'GET', array('scope' => 'lowHits', 'limit' => Yii::app()->params['maxPublications']));
        
        $renderParams = array(
            'model' => $model,
            'recentPublications' => $recentPublications,
            'popularPublications' => $popularPublications,
            'mostViewedPublications' => $mostViewedPublications,
            'lessViewedPublications' => $lessViewedPublications,
        );
        
        if (Yii::app()->request->isAjaxRequest) {
	    $this->controller->renderPartial('index', $renderParams, false, true);
	    Yii::app()->end();
	}
        
	if (Yii::app()->user->hasState('errorMessage')) {
	    Yii::app()->user->setFlash('error', Yii::app()->user->getState('errorMessage'));
	    Yii::app()->user->setState('errorMessage', null);
	}
        
        $this->controller->render('index', $renderParams);
    }

}