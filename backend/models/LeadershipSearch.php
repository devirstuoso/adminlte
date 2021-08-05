<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Leadership;

/**
 * LeadershipSearch represents the model behind the search form of `backend\models\Leadership`.
 */
class LeadershipSearch extends Leadership
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'leader_name', 'leader_postition'], 'safe'],
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
        $query = Leadership::find()->where(['<>', 'id', 'leader']);

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
            ->andFilterWhere(['like', 'leader_image', $this->leader_image])
            ->andFilterWhere(['like', 'leader_name', $this->leader_name])
            ->andFilterWhere(['like', 'leader_postition', $this->leader_postition])
            ->andFilterWhere(['like', 'leader_description', $this->leader_description]);

        return $dataProvider;
    }
}
