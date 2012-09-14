<?php

Yii::import("application.components.PersistenceServer");
Yii::import("application.models.enums.Gender");
Yii::import("application.models.enums.Status");

class UserController extends Controller
{

    public $layout = "main";

    public function actionList()
    {
        $persistent = new PersistenceServer();

        $users = $persistent->connect("user", "GET");

        $this->render('index', array(
            'model' => $users
        ));
    }

    public function actionView($id)
    {
        $persistent = new PersistenceServer();
        $user = $persistent->connect("user/" . $id, "GET");
        $userEditForm = new UserEditForm();
        foreach ($userEditForm->attributes as $k => $v) {
            $prefx = "usr_" . $k;
            $userEditForm->{$k} = $user->{$prefx};
        }

        $this->renderPartial('view', array(
            'userEditForm' => $userEditForm,
            'genders' => Gender::getGenders(),
            'status' => Status::getStatus(),
            'id' => $id
        ));
    }

    public function actionUpdate($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user/" . $id, "POST", $_POST['UserEditForm']);
        echo CJSON::encode($messages);
    }

    public function actionDelete($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user", "DELETE", array($id));
        echo CJSON::encode($messages);
    }

}