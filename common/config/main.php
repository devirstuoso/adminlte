<?php
return [
    'aliases' => [
        '@app_name' => '/adminlte',
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
                            'class' => '465',//'465 OR 587',
                            'encryption' => 'tls',
                        ],
                    'urlManagerModules' =>[
                        'class' => 'yii\web\urlManager',
                        'scriptUrl' => '/adminlte/common/modules/schools',
                        'baseUrl' => '@schools',
                        'enablePrettyUrl' => false,
                        'showScriptName' => false,
                    ],
                    ],

    ],

    'modules' => [
                  'schools' => [
                        'class' => 'common\modules\schools\School',
                        ],
    
    ],
    
];
