<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HomeSlider;

/**
 * HomeSliderSearch represents the model behind the search form of `backend\models\HomeSlider`.
 */
class HomeSliderSearch extends HomeSlider
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'slider_header_text', 'slider_subheader_text', 'slider_button_hide', 'slider_hide'], 'safe'],
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
        $query = HomeSlider::find();

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
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'slider_header_text', $this->slider_header_text])
            ->andFilterWhere(['like', 'slider_subheader_text', $this->slider_subheader_text])
            ->andFilterWhere(['like', 'slider_hide', $this->slider_button_hide])
            ->andFilterWhere(['like', 'slider_hide', $this->slider_hide]);

        return $dataProvider;
    }
}
