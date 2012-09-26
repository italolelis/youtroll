<?php

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
            'index' => 'application.controllers.site.IndexAction',
            'about' => 'application.controllers.site.AboutAction',
            'privacy' => 'application.controllers.site.PrivacyAction',
            'terms' => 'application.controllers.site.TermsAction',
            'help' => 'application.controllers.site.HelpAction',
        );
    }

}