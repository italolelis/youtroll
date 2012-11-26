<?php

Yii::import('application.components.Controller');

class ChannelController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + subscribe',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'subscribe' => 'application.controllers.channel.SubscribeAction',
	);
    }

}