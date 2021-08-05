<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NewsEvents;

/**
 * NewsEventsSearch represents the model behind the search form of `backend\models\NewsEvents`.
 */
class NewsEventsSearch extends NewsEvents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'ne_title', 'ne_type', 'ne_start_date', 'ne_end_date', 'ne_start_time', 'ne_end_time', 'ne_hide'], 'safe'],
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
        $query = NewsEvents::find();

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
            'ne_start_date' => $this->ne_start_date,
            'ne_end_date' => $this->ne_end_date,
            'ne_start_time' => $this->ne_start_time,
            'ne_end_time' => $this->ne_end_time,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'ne_title', $this->ne_title])
            ->andFilterWhere(['like', 'ne_link', $this->ne_link])
            ->andFilterWhere(['like', 'ne_image', $this->ne_image])
            ->andFilterWhere(['like', 'ne_type', $this->ne_type])
            ->andFilterWhere(['like', 'ne_hide', $this->ne_hide]);

        return $dataProvider;
    }
}
