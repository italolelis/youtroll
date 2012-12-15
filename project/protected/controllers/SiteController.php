<?php

Yii::import('application.components.Controller');

class SiteController extends Controller
{

    public function filters()
    {
        return array(
        );
    }

    public function actions()
    {
        return array(
            'error' => 'application.controllers.site.ErrorAction',
            'feed' => 'application.controllers.site.FeedAction',
            'index' => 'application.controllers.site.IndexAction',
        );
    }

}