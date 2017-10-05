<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'H7po3cqJkEqZxUyP4TSLE0LenfewHRPC',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'view' => [
	        'class' => 'yii\web\View',
	        'renderers' => [
		        'tpl' => [
			        'class' => 'yii\smarty\ViewRenderer',
			        //'cachePath' => '@runtime/Smarty/cache',
		        ],
		        'twig' => [
			        'class' => 'yii\twig\ViewRenderer',
			        'cachePath' => '@runtime/Twig/cache',
			        // Array of twig options:
			        'options' => [
				        'auto_reload' => true,
			        ],
			        'globals' => ['html' => '\yii\helpers\Html'],
			        'uses' => ['yii\bootstrap'],
		        ],
		        // ...
	        ],
        ],
//        'session' => [
//	        'class' => 'yii\web\DbSession',
//
//	        // Set the following if you want to use DB component other than
//	        // default 'db'.
//	        // 'db' => 'mydb',
//
//	        // To override default session table, set the following
//	        // 'sessionTable' => 'my_session',
//        ],
        'session' => [
	        'class' => 'yii\redis\Session',
	        'redis' => [
		        'hostname' => 'localhost',
		        'port' => 6379,
		        'database' => 0,
	        ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
