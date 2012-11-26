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
                $channel = PersistenceServer::connect("channel/{$publication->model->channel}", 'GET');
                $owner = PersistenceServer::connect("user/{$publication->model->owner}", 'GET');
                $reviewUser = PersistenceServer::connect("reviewUser/{$publication->model->id}", 'GET');
                
                $this->controller->render('view', array(
                    'publication' => $publication->model,
                    'stats' => $publication->stats,
                    'channel' => $channel->model,
                    'owner' => $owner->model,
                    'review' => $reviewUser->model,
                ));

                Yii::app()->end();
            }
        }
        
        HApp::throwException(404);
    }

}