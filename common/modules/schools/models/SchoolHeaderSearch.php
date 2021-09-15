<?php

namespace common\modules\schools\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\schools\models\SchoolHeader;

/**
 * SchoolHeaderSearch represents the model behind the search form of `backend\models\SchoolHeader`.
 */
class SchoolHeaderSearch extends SchoolHeader
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nav_item'], 'safe'],
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
        $query = SchoolHeader::find();//->where(['<>', 'id', 'header0000']);

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
            ->andFilterWhere(['like', 'nav_item', $this->nav_item])
            ->andFilterWhere(['like', 'nav_link', $this->nav_link]);

        return $dataProvider;
    }
}