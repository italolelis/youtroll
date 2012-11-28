<?php

class ViewAction extends CAction
{

    public function run()
    {
        $view = HApp::getRequest('GET', 'view');
        
        if(!empty($view)) {
            $idPublication = HSecurity::urlDecode($view);
            $publicationsRelated = PersistenceServer::connect('publication', 'GET', array('publication' => $idPublication, 'scope' => 'related', 'limit' => Yii::app()->params['maxPublications']));
            $publication = PersistenceServer::connect("publication/$idPublication", 'GET');
            
            if($publication->status) {
                $channel = PersistenceServer::connect("channel/{$publication->model->channel}", 'GET');
                $owner = PersistenceServer::connect("user/{$publication->model->owner}", 'GET');
                $reviewUser = PersistenceServer::connect("reviewUser/{$publication->model->id}", 'GET');
                $publicationsRelated = PersistenceServer::connect('publication', 'GET', array('publication' => $idPublication, 'scope' => 'related', 'limit' => Yii::app()->params['maxPublications']));
                
                if(Yii::app()->user->isGuest) {
                    $userSubscribe = false;
                } else {
                    $inscription = PersistenceServer::connect("inscription/{$channel->model->id}", 'GET');
                    
                    $userSubscribe = $inscription->status;
                }
                
                $this->controller->render('view', array(
                    'publication' => $publication->model,
                    'stats' => $publication->stats,
                    'channel' => $channel->model,
                    'owner' => $owner->model,
                    'review' => $reviewUser->model,
                    'publicationsRelated' => $publicationsRelated,
                    'userSubscribe' => $userSubscribe,
                ));

                Yii::app()->end();
            }
        }
        
        HApp::throwException(404);
    }

}