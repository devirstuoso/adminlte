<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'DU-IoE',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web' => '/frontend/web',
        ],
        'user' => [
            'enableSession' => true,
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.php',
            'rules' => [

                '' => 'site/index',
                'about' => 'site/about',
                'governing-council' => 'site/gov-council',
                'leadership' => 'site/leadership',
                'careers' => 'site/career',
                // 'careers/career1<id>' => 'site/career-1<id>',
                'schools/schoolf<id>' => 'schools/schoolf<id>',
                'annual-report' => 'site/report',
                'news&events' => 'site/news-events-page',

                'career-in' => '/site/career-1',

                // 's/<alias>' => 'site/<alias>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ],
        ],

        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '@backend_web/',
            // 'enablePrettyUrl' => true,
            // 'showScriptName' => false,
        ],
        
    ],
    'params' => $params,
];
