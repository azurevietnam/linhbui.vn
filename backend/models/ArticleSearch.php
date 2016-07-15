<?php

namespace backend\models;

use backend\models\Article;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * ArticleSearch represents the model behind the search form about `backend\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_category_id', 'type', 'view_count', 'like_count', 'comment_count', 'share_count', 'is_hot', 'position', 'status', 'is_active'], 'integer'],
            [['article_category_ids', 'name', 'content', 'slug', 'old_slugs', 'description', 'image', 'image_path', 'page_title', 'meta_title', 'meta_keywords', 'meta_description', 'h1', 'created_at', 'updated_at', 'created_by', 'updated_by', 'auth_alias', 'long_description', 'published_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'article_category_id' => $this->article_category_id,
            'type' => $this->type,
            'view_count' => $this->view_count,
            'like_count' => $this->like_count,
            'comment_count' => $this->comment_count,
            'share_count' => $this->share_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_hot' => $this->is_hot,
            'position' => $this->position,
            'status' => $this->status,
            'published_at' => $this->published_at,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_job', $this->customer_job])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'old_slugs', $this->old_slugs])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'h1', $this->h1])
            ->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'auth_alias', $this->auth_alias])
            ->andFilterWhere(['like', 'long_description', $this->long_description]);
        
        if ($this->article_category_ids != '') {
            switch ([$this->article_category_ids]) {
                case [0]:
                    $query->andFilterWhere(['not in', 'id', ArrayHelper::getColumn(ArticleToArticleCategory::find()->asArray()->all(), 'article_id')]);
                    break;
                default:
                    $query->leftJoin('article_to_article_category' , 'article_to_article_category.article_id = article.id')
                        ->andFilterWhere(['in', 'article_category_id', [$this->article_category_ids]]);
            }
        }
        return $dataProvider;
    }
}
