<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@linhbui.vn',
    'user.passwordResetTokenExpire' => 3600,
    
    'fb_app_id' => '',
    'ga_id' => '',
    'gcse_cx' => '',
    
    'root_url' => 'http://',
    'backend_url' => 'http://linhbui.vn/backend',
    'frontend_url' => 'http://linhbui.vn',
    'images_url' => 'http://linhbui.vn/images',
    'uploads_url' => 'http://linhbui.vn/backend/uploads',
    
    'root_folder' => '/data/website',
    'backend_folder' => '/home/linhbui/domains/linhbui.vn/public_html/backend/web',
    'frontend_folder' => '/home/linhbui/domains/linhbui.vn/public_html/frontend/web',
    'images_folder' => '/home/linhbui/domains/linhbui.vn/public_html/frontend/web/images',
    'uploads_folder' => '/home/linhbui/domains/linhbui.vn/public_html/backend/web/uploads',
    
    'relative_backend_folder' => '/backend/web',
    'relative_frontend_folder' => '/frontend/web',
    'relative_images_folder' => '/frontend/web/images',
    'relative_uploads_folder' => '/backend/web/uploads',
        
    'default_image' => '',
    
    'wph_ratios' => [
        'product_slide_image' => 15/16.93,
        'product_image' => 7.12/10.56,
        'product_category_image' => 1/1,
        'article_image' => 16/9, // 4^2 / 3^2
        'gallery_image' => 16/9,
        'video_image' => 16/9,
        'slideshow_image' => 64/27, // 4^3 / 3^3
    ],

    'decive_types' => [
        'desktop' => 1,
        'mobile' => 2,
        'tablet' => 3
    ],
    
    'enable_cache' => true,
    'cache_duration' => 3600,
    'cache_file_dependency_folder' => '/home/linhbui/domains/linhbui.vn/public_html/common/runtime/file-dependency'
];
