<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductFile;

/**
 * ProductFileSearch represents the model behind the search form about `backend\models\ProductFile`.
 */
class ProductFileSearch extends ProductFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'os_id'], 'integer'],
            [['product_version', 'product_ref_url', 'filename', 'extension', 'file_src', 'os_version', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['file_size'], 'number'],
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
        $query = ProductFile::find();
        if (!empty($params['product_id'])) {
            $query->where(['product_id' => $params['product_id']]);
        }
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
            'product_id' => $this->product_id,
            'size' => $this->file_size,
            'os_id' => $this->os_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'product_version', $this->product_version])
            ->andFilterWhere(['like', 'product_ref_url', $this->product_ref_url])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'file_src', $this->file_src])
            ->andFilterWhere(['like', 'os_version', $this->os_version])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
