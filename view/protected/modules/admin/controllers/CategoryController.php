<?php

Yii::import("application.components.PersistenceServer");

class CategoryController extends Controller
{

    public $layout = "main";

    public function actionList()
    {
        $persistent = new PersistenceServer();

        $categories = $persistent->connect("category", "GET");

        $this->render('index', array(
            'model' => $categories
        ));
    }

    public function actionView($id)
    {
        $persistent = new PersistenceServer();
        $category = $persistent->connect("category", "GET", array($id));
        $this->render('view', array(
            'model' => $category
        ));
        
        $formCategoria = new CategoryForm();
        $this->renderPartial('view',array('formCategoria'=>$formCategoria)); 
        
    }

    public function actionUpdate($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("category", "POST", array($id));
        echo CJSON::encode($messages);
    }

    public function actionDelete($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("category", "DELETE", array($id));
        echo CJSON::encode($messages);
    }

}