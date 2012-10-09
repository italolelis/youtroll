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
            'about' => 'application.controllers.site.AboutAction',
            'error' => 'application.controllers.site.ErrorAction',
            'index' => 'application.controllers.site.IndexAction',
            'privacy' => 'application.controllers.site.PrivacyAction',
            'terms' => 'application.controllers.site.TermsAction',
        );
    }

}