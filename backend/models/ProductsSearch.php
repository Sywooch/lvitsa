<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `backend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public $categoryTitle;

    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'showcase', 'popular', 'latest', 'recommend', 'visible'], 'integer'],
            [['brand', 'name', 'alias', 'price', 'size', 'textile', 'colour', 'description','categoryTitle'], 'safe'],
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
        $query = Products::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]],
            'pagination' => [
                'pageSize' => 20,
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'showcase' => $this->showcase,
            'popular' => $this->popular,
            'latest' => $this->latest,
            'recommend' => $this->recommend,
            'visible' => $this->visible,
        ]);

        $query
            //->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'textile', $this->textile])
            ->andFilterWhere(['like', 'colour', $this->colour])
            ->andFilterWhere(['like', 'description', $this->description]);

        /*$query->joinWith(['category' => function ($q) {
            $q->where('categories.id LIKE "%' . $this->categoryTitle . '%"');
        }]);*/


        return $dataProvider;
    }
}
