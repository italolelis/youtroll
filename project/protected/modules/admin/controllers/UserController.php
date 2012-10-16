<?php

Yii::import("application.components.Controller");
Yii::import("application.components.PersistenceServer");

class UserController extends Controller
{

    public function actionList()
    {
        $this->render('index', array('model' => PersistenceServer::connect('user', 'GET')));
    }

    public function actionView($id)
    {
        $response = PersistenceServer::connect("user/$id", 'GET', null, null, null, true);

        $userEditForm = new UserEditForm();
        $userEditForm->attributes = $response;

        $this->renderPartial('view', array('userEditForm' => $userEditForm, 'id' => $id));
    }

    public function actionUpdate($id)
    {
        $response = PersistenceServer::connect("user/$id", 'POST', $_POST['UserEditForm']);
        echo CJSON::encode($response);
    }

    public function actionDelete($id)
    {
        $response = PersistenceServer::connect("user/$id", 'POST', array($id));
        echo CJSON::encode($response);
    }

}