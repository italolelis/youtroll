<?php

Yii::import("application.components.Controller");

class PanelController extends Controller
{
    
    public function actionIndex()
    {
        $this->render('index');
    }
    
}