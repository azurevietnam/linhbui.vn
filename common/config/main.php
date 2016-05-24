<?php
return [
    'name' => 'Xemtuvi.mobi',
    'charset' => 'UTF-8',
    'language' => 'vi-VN',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            // database config
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=xemtuvi',
            'username' => 'xemtuvi_user',
            'password' => '3XLrQLzc5sXtjzVc',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            // Duration of schema cache.
            'schemaCacheDuration' => 3600,
            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '',
                'username' => '',
                'password' => '',
//                'port' => '587',
//                'encryption' => 'tls',
                'port' => '465',
                'encryption' => 'ssl',
            ], 
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id', // id field of model User
                ]
            ],
        ]
    ],    
];
