<?php

Yii::import('application.components.Controller');

class CategoryController extends Controller
{

    public function filters()
    {
	return array(
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'view' => 'application.controllers.category.ViewAction',
	);
    }

}