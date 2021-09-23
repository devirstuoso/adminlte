<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'DU-IoE-Admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'aliases' => [
        '@adminlte/widgets'=>'@vendor/adminlte/hail812/yii2-adminlte-widgets'
    ],
    'modules' => [],
    'components' => [
        'request' => [
            // 'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web' => '/backend/web',
            'adminUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
    //     'view' => [
    //      'theme' => [
    //          'pathMap' => [
    //             '@backend/views' => '@vendor/hail812/yii2-adminlte3/src/views'
    //          ],
    //      ],
    // ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => true,
            'rules' => [
                '' => 'site/index',
                // '<action>' => 'site/<action>',
                // '<controller>index' => '<controller>/index'
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'scriptUrl' => '/adminlte',
            'baseUrl' => '@frontend/web',
            'enablePrettyUrl' => true,
            // 'showScriptName' => false,
        ],

    ],
    'params' => $params,

];
