<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Footer;

/**
 * FooterSearch represents the model behind the search form of `backend\models\Footer`.
 */
class FooterSearch extends Footer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'content_id', 'inst_name', 'inst_addr', 'inst_copyr'], 'safe'],
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
        $query = Footer::find();//->where(['<>', 'id', 'leader']);

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
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'inst_name', $this->inst_name])
            ->andFilterWhere(['like', 'inst_addr', $this->inst_addr])
            ->andFilterWhere(['like', 'inst_copyr', $this->inst_copyr]);

        return $dataProvider;
    }
}
