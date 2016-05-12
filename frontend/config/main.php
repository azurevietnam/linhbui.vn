<?php

use common\models\PageGroup;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => [
        'log', 
        'gii'
    ],
    'modules' => [
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
            'scriptUrl' => '/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Sitemap
                ['pattern' => 'sitemap.xml', 'route' => 'sitemap/index'],
                ['pattern' => 'sitemap-<' . PageGroup::URL_SLUG . '>.xml', 'route' => 'sitemap/article'],
                // Trang chủ
                ['pattern' => '', 'route' => 'site/index'],
                ['pattern' => '', 'route' => 'site/index', 'suffix' => '/'],
                // Tags
                ['pattern' => 'tim-kiem/<' . PageGroup::URL_SLUG . '>', 'route' => 'tag/index'],
                ['pattern' => 'tim-kiem/<' . PageGroup::URL_SLUG . '>', 'route' => 'tag/index', 'suffix' => '/'], 
                // Tin tức
                ['pattern' => 'article/counter', 'route' => 'article/counter'],
                ['pattern' => '<' . PageGroup::URL_PARENT_CATEGORY_SLUG . '>/<' . PageGroup::URL_CATEGORY_SLUG . '>/<' . PageGroup::URL_SLUG . '>.html', 'route' => 'article/index'],
                ['pattern' => '<' . PageGroup::URL_CATEGORY_SLUG . '>/<' . PageGroup::URL_SLUG . '>.html', 'route' => 'article/index'],
                // Danh mục tin tức
                ['pattern' => '<' . PageGroup::URL_PARENT_CATEGORY_SLUG . '>/<' . PageGroup::URL_SLUG . '>', 'route' => 'article-category/index', 'suffix' => '/'],
                ['pattern' => '<' . PageGroup::URL_PARENT_CATEGORY_SLUG . '>/<' . PageGroup::URL_SLUG . '>', 'route' => 'article-category/index'],
                ['pattern' => '<' . PageGroup::URL_SLUG . '>', 'route' => 'article-category/index', 'suffix' => '/'],
                ['pattern' => '<' . PageGroup::URL_SLUG . '>', 'route' => 'article-category/index'],
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
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
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => false
//                [
//                    'sourcePath' => null, // do not publish the bundle
//                    'basePath' => '@webroot',
//                    'baseUrl' => '@web',
//                    'js' => [
//                        'js/jquery-2.1.3.min.js',
//                    ]
//                ],
            ],
        ],      
    ],
    'params' => $params,
];
