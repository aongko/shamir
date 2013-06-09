<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Shamir Academy',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		//'application.models.*',
		'application.models.activeRecord.*',
		'application.models.formModel.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'projectsbd',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'class'=>array(
			'defaultController'=>'home',
		),
		/*
		'Learn',
		
		'MyClass',
		'MyProfile',
		'AboutUs',
		'ContactUs',
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'authTimeout'=>3600*1, // 1 hour
			//'loginUrl'=>,
			//'returnUrl'=>Yii::app()->request->baseUrl,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'class/<classID:\d+>/<apapun:\w+>/<controller:\w+>/<action:\w+>/*'=>'class/<apapun>/<controller>/<action>',
				'class/<classID:\d+>/<apapun:\w+>/<controller:\w+>/*'=>'class/<apapun>/<controller>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>/',
			),
			'showScriptName'=>false,
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			//'connectionString' => 'mysql:host=mysql.idhostinger.com;dbname=u458029473_psbd',
			'connectionString' => 'mysql:host=localhost;dbname=shamir',
			'emulatePrepare' => true,
			'username' => 'shamir',
			'password' => 'projectsbd',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
