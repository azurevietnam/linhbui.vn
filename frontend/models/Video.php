<?php

namespace frontend\models;

use backend\models\Tag;
use common\models\Html;
use yii\db\ActiveQuery;
use yii\helpers\Url;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $old_slugs
 * @property string $source
 * @property string $description
 * @property string $meta_description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $page_title
 * @property string $h1
 * @property string $image
 * @property string $image_path
 * @property integer $status
 * @property integer $is_hot
 * @property integer $is_active
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 * @property integer $published_at
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $like_count
 * @property integer $share_count
 * @property string $long_description
 *
 * @property VideoToTag[] $videoToTags
 * @property Tag[] $tags
 */
class Video extends Html
{
    
    public $_link;
    public function getLink() {
        if ($this->_link === null) {
            $this->_link = Url::to(['video/index', 'slug' => $this->slug], true);
        }
        return $this->_link;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'source', 'created_at', 'created_by'], 'required'],
            [['status', 'is_hot', 'is_active', 'created_at', 'updated_at', 'published_at', 'view_count', 'comment_count', 'like_count', 'share_count'], 'integer'],
            [['long_description'], 'string'],
            [['name', 'slug', 'source', 'meta_title', 'meta_keywords', 'page_title', 'h1', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'source' => 'Source',
            'description' => 'Description',
            'meta_description' => 'Meta Description',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'page_title' => 'Page Title',
            'h1' => 'H1',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'status' => 'Status',
            'is_hot' => 'Is Hot',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'published_at' => 'Published At',
            'view_count' => 'View Count',
            'comment_count' => 'Comment Count',
            'like_count' => 'Like Count',
            'share_count' => 'Share Count',
            'long_description' => 'Long Description',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getVideoToTags()
    {
        return $this->hasMany(VideoToTag::className(), ['video_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('video_to_tag', ['video_id' => 'id']);
    }
}
