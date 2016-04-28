<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'gii'
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => '@app/views/layouts/main.php',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [ //here
                'model' => [ // generator name
                    'class' => 'common\gii\generators\model\Generator', // generator class
                    'templates' => [ //setting for out templates
                        'custom' => __DIR__ . '/../../common/gii/generators\model/default', // template name => path to template
                    ]
                ],
                'crud' => [ // generator name
                    'class' => 'common\gii\generators\crud\Generator', // generator class
                    'templates' => [ //setting for out templates
                        'custom' => __DIR__ . '/../../common/gii/generators\crud/default', // template name => path to template
                    ]
                ]
            ],
        ]         
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'frontendUrlManager' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Sitemap
                ['pattern' => 'sitemap.xml', 'route' => 'sitemap/index'],
                ['pattern' => 'sitemap-<slug>.xml', 'route' => 'sitemap/article'],
                // Tags
                ['pattern' => 'tim-kiem/<slug>', 'route' => 'tag/index'],
                ['pattern' => 'tim-kiem/<slug>', 'route' => 'tag/index', 'suffix' => '/'], 
                // Tin tức
                ['pattern' => 'article/counter', 'route' => 'article/counter'],
                ['pattern' => '<parent_cate_slug>/<cate_slug>/<slug>.html', 'route' => 'article/index'],
                ['pattern' => '<cate_slug>/<slug>.html', 'route' => 'article/index'],
                // Danh mục tin tức
                ['pattern' => '<parent_slug>/<slug>', 'route' => 'article-category/index', 'suffix' => '/'],
                ['pattern' => '<parent_slug>/<slug>', 'route' => 'article-category/index'],
                ['pattern' => '<slug>', 'route' => 'article-category/index', 'suffix' => '/'],
                ['pattern' => '<slug>', 'route' => 'article-category/index'],
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.luspel.com',
                'username' => 'noreply@luspel.com',
                'password' => 'OeEharIvy69w8Bh',
                'port' => '25', // Port 25 is a very common port too
                //'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],        
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
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
//            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => false,
            ],
        ],        
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'user/*',
            'site/*',     
        ]
    ],  
    // follow config when redirect user to login form if not logged in
    'as beforeRequest' => [  //if guest user access site so, redirect to login page.
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'actions' => ['login', 'error', 'site'],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],    
    'params' => $params,
];
