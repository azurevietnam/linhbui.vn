<?php

use common\models\PageGroup;

$slug = PageGroup::URL_SLUG;
$parent_slug = PageGroup::URL_PARENT_CATEGORY_SLUG;
$type = PageGroup::URL_TYPE;
$alias = PageGroup::URL_ALIAS;

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
        'request' => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'scriptUrl' => '/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // Trang chủ
                ['pattern' => '', 'route' => 'site/index'],
                ['pattern' => '', 'route' => 'site/index', 'suffix' => '/'],
                // Sitemap
                ['pattern' => 'sitemap.xml', 'route' => 'sitemap/index'],
                ['pattern' => "sitemap-<$alias>.xml", 'route' => 'sitemap/details'],
                // Sản phẩm
                ['pattern' => 'product/counter', 'route' => 'product/counter'],
                ['pattern' => 'san-pham', 'route' => 'product/view-all'],
                ['pattern' => 'san-pham', 'route' => 'product/view-all', 'suffix' => '/'],
                ['pattern' => "san-pham/<$slug>", 'route' => 'product/index', 'suffix' => '.html'],
                // Video
                ['pattern' => 'video/counter', 'route' => 'video/counter'],
                ['pattern' => 'video', 'route' => 'video/view-all'],
                ['pattern' => 'video', 'route' => 'video/view-all', 'suffix' => '/'],
                ['pattern' => "video/<$slug>", 'route' => 'video/index', 'suffix' => '.html'],
                // Hình ảnh
                ['pattern' => 'gallery/counter', 'route' => 'gallery/counter'],
                ['pattern' => 'hinh-anh', 'route' => 'gallery/view-all'],
                ['pattern' => 'hinh-anh', 'route' => 'gallery/view-all', 'suffix' => '/'],
                ['pattern' => "hinh-anh/<$slug>", 'route' => 'gallery/index', 'suffix' => '.html'],
                // Bộ sưu tập
                ['pattern' => 'bo-suu-tap', 'route' => 'product-category/view-all'],
                ['pattern' => 'bo-suu-tap', 'route' => 'product-category/view-all', 'suffix' => '/'],
                ['pattern' => "bo-suu-tap/<$parent_slug>/<$slug>", 'route' => 'product-category/index'],
                ['pattern' => "bo-suu-tap/<$parent_slug>/<$slug>", 'route' => 'product-category/index', 'suffix' => '/'],
                ['pattern' => "bo-suu-tap/<$slug>", 'route' => 'product-category/index'],
                ['pattern' => "bo-suu-tap/<$slug>", 'route' => 'product-category/index', 'suffix' => '/'],
                // Bài viết
                ['pattern' => 'article/counter', 'route' => 'article/counter'],
                ['pattern' => "<$type>/<$slug>", 'route' => 'article/index', 'suffix' => '.html'],
                ['pattern' => "<$slug>", 'route' => 'article/index', 'suffix' => '.html'],
                ['pattern' => "<$type>", 'route' => 'article/view-all'],
                ['pattern' => "<$type>", 'route' => 'article/view-all', 'suffix' => '/'],
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
