<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@linhbui.vn',
    'user.passwordResetTokenExpire' => 3600,
    
    'fb_app_id' => '',
    'ga_id' => '',
    'gcse_cx' => '',
    
    'root_url' => 'http://',
    'backend_url' => 'http://admin.linhbui.vn',
    'frontend_url' => 'http://linhbui.vn',
    'images_url' => 'http://linhbui.vn/images',
    'uploads_url' => 'http://admin.linhbui.vn/uploads',
    
    'root_folder' => '/data/website',
    'backend_folder' => '/data/website/linhbui.vn/backend/web',
    'frontend_folder' => '/data/website/linhbui.vn/frontend/web',
    'images_folder' => '/data/website/linhbui.vn/frontend/web/images',
    'uploads_folder' => '/data/website/linhbui.vn/backend/web/uploads',
    
    'relative_backend_folder' => '',
    'relative_frontend_folder' => '',
    'relative_images_folder' => '/images',
    'relative_uploads_folder' => '/uploads',
        
    'default_image' => 'http://linhbui.vn/images/default.jpg',
    
    'wph_ratios' => [
        'article_image' => 1.75,
        'product_category_image' => 1.0,
        'product_image' => 0.75,
        'banner' => 2.63,
    ],

    'decive_types' => [
        'desktop' => 1,
        'mobile' => 2,
        'tablet' => 3
    ],
    
    'enable_cache' => true,
    'cache_duration' => 3600,
    'cache_file_dependency_folder' => '/data/website/linhbui.vn/common/runtime/file-dependency'
];
