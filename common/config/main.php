<?php
$config = [
    'aliases' => [
        '@app_name' => '/adminlte',             //app name
        '@backend_url' => '@app_name/backend',
        '@backend_web' => '@backend_url/web',
        '@frontend_url' => '@app_name/frontend',
        '@frontend_web' => '@frontend_url/web',

        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',

        '@schools' => '@app_name/common/modules/schools',

    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
                    ],  //clear cache each time
        'filedb' => [
            'class' => 'yii2tech\filedb\Connection',
            'path' => '@common/data/files',
                    ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@backend/mail',
            'useFileTransport' => false,
            'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' =>'devanshuverma158@gmail.com',
                    'password' => '*\X3CZVnay@<?"?R',
                    'port' => '587',//'465 OR 587',
                    'encryption' => 'tls',
                        ],
                    ],
            'authManager' => [
                    'class' => 'yii\rbac\DbManager', //'yii\rbac\PhpManager',
                    ],
            'rbac' => [
                    'class' => 'common\components\Rbac',
                    ], 
                    // 'urlManager' => [
                    //     'enablePrettyUrl' => true,
                    //     'showScriptName' => true,
                    //     'rules' => [
                    //     ],
                    // ],

                    

                    // 'urlManagerSchools' =>[
                    //     'class' => 'yii\web\urlManager',
                    //     'scriptUrl' => '/adminlte/common/modules/schools',
                    //     'baseUrl' => '@schools',
                    //     'enablePrettyUrl' => true,
                    //     'showScriptName' => false,
                    // ],

                ],

                'modules' => [
                  'schools' => [
                    'class' => 'common\modules\schools\School',
                ],
            ],
        ];

        if (YII_ENV_DEV) {
      // configuration adjustments for 'dev' environment
          $config['bootstrap'][] = 'debug';
          $config['modules']['debug'] = [
           'class' => 'yii\debug\Module',
       ];
       $config['bootstrap'][] = 'gii';
       $config['modules']['gii'] = [
           'class' => 'yii\gii\Module',
       ];
   }

   return $config;


