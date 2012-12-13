<?php

class SearchAction extends CAction
{

    public function run()
    {
        $search = HApp::getRequest('PARAM', 'search');

        if (!empty($search)) {
            $publications = PersistenceServer::connect('publication', 'GET', array('search' => $search, 'scope' => 'search', 'limit' => Yii::app()->params['maxSearchPublications']));
            
            $renderParams = array(
                'search' => $search,
                'publications' => $publications,
            );
            
            if(Yii::app()->request->isAjaxRequest) {
                $this->controller->renderPartial('search', $renderParams, false, true);
                Yii::app()->end();
            }
            
            $this->controller->render('search', $renderParams);
            Yii::app()->end();
        }

        HApp::throwException(403);
    }

}