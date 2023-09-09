<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AppleList;

/**
 * AppleListSearch represents the model behind the search form of `common\models\AppleList`.
 */
class AppleListSearch extends AppleList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'is_delete'], 'integer'],
            [['date_appearance', 'date_fall'], 'safe'],
            [['eat'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = AppleList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_appearance' => $this->date_appearance,
            'date_fall' => $this->date_fall,
            'status' => $this->status,
            'eat' => $this->eat,
            'is_delete' => $this->is_delete,
        ]);

        return $dataProvider;
    }
}
