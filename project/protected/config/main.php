<?php

// Yii::setPathOfAlias('local','path/to/local-folder');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'theme' => 'default',
    'defaultController' => 'site',
    'sourceLanguage' => 'en_us',
    'preload' => array(
        'log',
//        'bootstrap',
    ),
    'import' => array(
        'application.models.enums.*',
        'application.models.forms.*',
        'application.models.helpers.*',
    ),
    
    'modules' => array(
        //*
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'qwerty',
            'ipFilters' => array('*'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
        //*/
        'admin',
    ),
    
    'components' => array(
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
        ),
        
        'user' => array(
            'allowAutoLogin' => true,
        ),
        
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        
        'urlManager' => array(
	    'urlFormat' => 'path',
	    'showScriptName' => false,
	    'caseSensitive' => true,
	    'useStrictParsing' => true,
	    'rules' => array(
                array('admin/<controller>/list', 'pattern' => 'admin/<controller:\w+>', 'verb' => 'GET'),
                array('admin/<controller>/view', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'GET'),
                array('admin/<controller>/update', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'POST'),
                array('admin/<controller>/delete', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('admin/<controller>/create', 'pattern' => 'admin/<controller:\w+>', 'verb' => 'POST'),
                
                'admin' => array('admin/panel'),
                
                '' => array('site/index'),
                '<action:(login|logout)>' => 'user/<action>',
                '<action:(view)>/<id:\w+>' => 'publication/<action>/view/<id>',
		'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	    ),
	),
        
        'clientScript' => array(
	    'class' => 'ext.several.NLSClientScript',
	    'excludePattern' => '/\.tpl/i', //js regexp, files with matching paths won't be filtered is set to other than 'null'
//	    'includePattern' => '/\.php/' //js regexp, only files with matching paths will be filtered if set to other than 'null'
	),
        
        'file' => array(
            'class' => 'ext.several.CFile',
        ),
        
        'mail' => array(
	    'class' => 'application.extensions.yii-mail.YiiMail',
	    'transportType' => 'smtp',
	    'transportOptions' => array(
		'host' => 'mail.cotacoesecompras.com.br',
		'username' => 'edi',
		'password' => 'relogioAzul!#',
		'port' => 25,
	    ),
	    
	    'viewPath' => 'application.views.mails',
	    'logging' => true,
	    'dryRun' => false,
	),
        
        'widgetFactory' => array(
            'widgets' => array(
            ),
        ),
        
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    
    'params' => require(dirname(__FILE__) . '/params.php'),
);