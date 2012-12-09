<?php

Yii::import('application.components.Controller');

class PublicationController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + assess',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
            'assess' => 'application.controllers.publication.AssessAction',
            'send' => 'application.controllers.publication.SendAction',
            'share' => 'application.controllers.publication.ShareAction',
            'show' => 'application.controllers.publication.ShowAction',
            'view' => 'application.controllers.publication.ViewAction',
	);
    }

}