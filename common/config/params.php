<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@vngame.me',
    'user.passwordResetTokenExpire' => 3600,
    
    'site_name' => 'vngame.me',
    'site_version' => '1.0',
    'fb_app_id' => '529991420517704',
    'ga_id' => 'UA-76773982-1',
    'gcse_cx' => '018283733847891945836:as0xxdwkweu',
    
    'root_url' => 'http://',
    'backend_url' => 'http://admin.vngame.me',
    'frontend_url' => 'http://vngame.me',
    'images_url' => 'http://vngame.me/images',
    'uploads_url' => 'http://admin.vngame.me/uploads',
    
    'root_folder' => '/data/website',
    'backend_folder' => '/data/website/vngame.me/backend/web',
    'frontend_folder' => '/data/website/vngame.me/frontend/web',
    'images_folder' => '/data/website/vngame.me/frontend/web/images',
    'uploads_folder' => '/data/website/vngame.me/backend/web/uploads',
    
    'relative_backend_folder' => '',
    'relative_frontend_folder' => '',
    'relative_images_folder' => '/images',
    'relative_uploads_folder' => '/uploads',
    
    'default_image' => '',
    'allow_rm_dir_contains_less' => 20,
    
    'wph_ratios' => [
        'article_image' => 1.75,
        'product_image' => 1.0,
        'product_banner' => 1.96,
    ],

    'decive_types' => [
        'desktop' => 1,
        'mobile' => 2,
        'tablet' => 3
    ],
    
    'cache_time' => [
        'long' => 1800,
        'medium' => 600,
        'short' => 300
    ]
];
