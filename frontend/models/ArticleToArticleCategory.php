<?php

namespace frontend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "article_to_article_category".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $article_category_id
 *
 * @property ArticleCategory $articleCategory
 * @property Article $article
 */
class ArticleToArticleCategory extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_to_article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'article_category_id'], 'required'],
            [['article_id', 'article_category_id'], 'integer'],
            [['article_id', 'article_category_id'], 'unique', 'targetAttribute' => ['article_id', 'article_category_id'], 'message' => 'The combination of Article ID and Article Category ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'article_category_id' => 'Article Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
}
