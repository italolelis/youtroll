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
        $category = $persistent->connect("category/" . $id, "GET");
        $categoryForm = new CategoryForm();

        foreach ($categoryForm->attributes as $k => $v) {
            $prefx = "cmc_ctg_" . $k;
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