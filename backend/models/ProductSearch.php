<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'original_price', 'is_hot', 'is_active', 'status', 'position', 'view_count', 'like_count', 'share_count', 'comment_count', 'download_count', 'available_quantity', 'order_quantity', 'sold_quantity', 'total_quantity', 'total_revenue'], 'integer'],
            [['product_category_ids', 'name', 'code', 'slug', 'old_slugs', 'manufacturer', 'image', 'banner', 'image_path', 'details', 'description', 'long_description', 'page_title', 'h1', 'meta_title', 'meta_description', 'meta_keywords', 'published_at', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['review_score'], 'number'],
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
        $query = Product::find();

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
            'price' => $this->price,
            'original_price' => $this->original_price,
            'is_hot' => $this->is_hot,
            'is_active' => $this->is_active,
            'status' => $this->status,
            'position' => $this->position,
            'view_count' => $this->view_count,
            'like_count' => $this->like_count,
            'share_count' => $this->share_count,
            'comment_count' => $this->comment_count,
            'download_count' => $this->download_count,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'available_quantity' => $this->available_quantity,
            'order_quantity' => $this->order_quantity,
            'sold_quantity' => $this->sold_quantity,
            'total_quantity' => $this->total_quantity,
            'total_revenue' => $this->total_revenue,
            'review_score' => $this->review_score,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'old_slugs', $this->old_slugs])
            ->andFilterWhere(['like', 'manufacturer', $this->manufacturer])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'long_description', $this->long_description])
            ->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'h1', $this->h1])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        if ($this->product_category_ids != '') {
            switch ([$this->product_category_ids]) {
                case [0]:
                    $query->andFilterWhere(['not in', 'id', ArrayHelper::getColumn(ProductToProductCategory::find()->asArray()->all(), 'product_id')]);
                    break;
                default:
                    $query->leftJoin('product_to_product_category' , 'product_to_product_category.product_id = product.id')
                        ->andFilterWhere(['in', 'product_category_id', [$this->product_category_ids]]);
            }
        }
        
        return $dataProvider;
    }
}
