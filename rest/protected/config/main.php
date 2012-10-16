<?php

// Yii::setPathOfAlias('local','path/to/local-folder');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'defaultController' => 'api',
    'preload' => array('log'),
    'import' => array(
	'application.models.helpers.*',
	'application.models.tables.*',
    ),
    
    'modules' => array(
	//*
	'gii' => array(
	    'class' => 'system.gii.GiiModule',
	    'password' => 'qwerty',
	    'ipFilters' => array('*'),
	),
	//*/
    ),
    
    'components' => array(
	'user' => array(
	    'allowAutoLogin' => true,
	),
	
	'urlManager' => array(
	    'urlFormat' => 'path',
	    'showScriptName' => false,
	    'caseSensitive' => true,
	    'useStrictParsing' => true,
	    
	    'rules' => array(
		'' => array('api/index'),
		'<action:(login)>' => array('user/<action>'),
                
		array('<controller>/list', 'pattern' => '<controller:\w+>', 'verb' => 'GET'),
		array('<controller>/view', 'pattern' => '<controller:\w+>/<id:[\w-]+>', 'verb' => 'GET'),
		array('<controller>/update', 'pattern' => '<controller:\w+>/<id:[\w-]+>', 'verb' => 'POST'),
		array('<controller>/delete', 'pattern' => '<controller:\w+>/<id:[\w-]+>', 'verb' => 'DELETE'),
		array('<controller>/insert', 'pattern' => '<controller:\w+>', 'verb' => 'POST'),
                
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	    ),
	),
	
	'db' => array(
	    'connectionString' => 'mysql:host=localhost;dbname=youtroll_db',
	    'emulatePrepare' => true,
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
	),
	
	'errorHandler' => array(
	    'errorAction' => 'api/error',
	),
	
	'log' => array(
	    'class' => 'CLogRouter',
	    'routes' => array(
		array(
		    'class' => 'CFileLogRoute',
		    'levels' => 'error',
		),
	    ),
	),
	
	'widgetFactory' => array(
	    'widgets' => array(
	    ),
	),
    ),
    
    'params' => require(dirname(__FILE__) . '/params.php'),
);