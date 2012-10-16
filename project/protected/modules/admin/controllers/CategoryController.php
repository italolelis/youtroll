<?php

Yii::import("application.components.Controller");
Yii::import("application.components.PersistenceServer");

class CategoryController extends Controller
{

    public function actionList()
    {
        $this->render('index', array('model' => PersistenceServer::connect('category', 'GET')));
    }

    public function actionCreate()
    {
        if (Yii::app()->request->isPostRequest) {
            PersistenceServer::connect('category', 'POST', HApp::getRequest('POST', 'CategoryForm'));
        }
    }

    public function actionAdd()
    {
        $categoryForm = new CategoryForm();
        $this->renderPartial('create', array(
            'categoryForm' => $categoryForm
        ));
    }

    public function actionView($id)
    {
        $category = PersistenceServer::connect("category/$id", 'GET');
        $categoryForm = new CategoryForm();
        foreach ($categoryForm->attributes as $k => $v) {
            $prefx = "ctg_" . $k;
            $categoryForm->{$k} = $category->{$prefx};
        }

        $this->renderPartial('view', array(
            'categoryForm' => $categoryForm,
            'model' => $category
        ));
    }

    public function actionUpdate($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("category/" . $id, "POST", $_POST['categoryForm']);
        echo CJSON::encode($messages);
    }

    public function actionDelete($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("category", "DELETE", array($id));
        echo CJSON::encode($messages);
    }

}