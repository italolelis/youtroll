<?php

class ViewAction extends CAction
{

    public function run()
    {
        $view = HApp::getRequest('GET', 'view');
        
        if(!empty($view)) {
            $idPublication = HSecurity::urlDecode($view);
            
            $publication = PersistenceServer::connect("publication/$idPublication", 'GET');
            
            if($publication->status) {
                $owner = PersistenceServer::connect("user/{$publication->model->owner}", 'GET');
                $reviewUser = PersistenceServer::connect("reviewUser/{$publication->model->id}", 'GET');
                
                if($owner->status) {
                    $this->controller->render('//publication/view', array(
                        'publication' => $publication->model,
                        'stats' => $publication->stats,
                        'owner' => $owner->model,
                        'review' => $reviewUser->model,
                    ));
                    Yii::app()->end();
                }
            }
        }
        
        HApp::throwException(404);
    }

}