<?php

namespace common\modules\schools\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\schools\models\SchoolOffice;

/**
 * SchoolOfficeSearch represents the model behind the search form of `common\modules\schools\models\SchoolOffice`.
 */
class SchoolOfficeSearch extends SchoolOffice
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'name', 'position', 'description'], 'safe'],
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
        $query = SchoolOffice::find();

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
            ->andFilterWhere(['like', 'school_id', $this->school_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['=', 'position', $this->position])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
