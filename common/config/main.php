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
                            'username' => 'devanshuverma158@gmail.com',
                            'password' => '*\X3CZVnay@<?"?R',
                            'port' => '587',//'465',
                            'encryption' => 'tls',
                        ],
                    ],

    ],

    'modules' => [
                  'schools' => [
                        'class' => 'common\modules\schools\School',
                        ],
    
    ],
    
];
