<?php

namespace common\models;

class Info extends MyActiveRecord {
    //put your code here
    
    const TYPE_FAQ = 1;
    const TYPE_PROFILE = 2;
    const TYPE_CONTACT = 3;
    
    public static $types = [
        Info::TYPE_FAQ => 'Hỏi đáp',
        Info::TYPE_PROFILE => 'Giới thiệu',
        Info::TYPE_CONTACT => 'Liên hệ',
    ];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules() 
    { 
       return [ 
           [['name', 'type', 'slug', 'content', 'created_at', 'created_by'], 'required'], 
           [['type', 'is_active'], 'integer'], 
           [['long_description', 'content'], 'string'], 
           [['created_at', 'updated_at'], 'safe'], 
           [['name', 'slug', 'page_title', 'h1', 'meta_title', 'meta_description', 'meta_keywords', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255], 
           [['description'], 'string', 'max' => 511], 
           [['old_slugs'], 'string', 'max' => 2000], 
           [['image_path'], 'unique'], 
           [['slug', 'is_active'], 'unique', 'targetAttribute' => ['slug', 'is_active'], 'message' => 'The combination of Slug and Is Active has already been taken.'] 
       ]; 
    }
}
