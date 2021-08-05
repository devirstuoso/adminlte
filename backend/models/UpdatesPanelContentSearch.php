<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UpdatesPanelContent;

/**
 * UpdatesPanelContentSearch represents the model behind the search form of `backend\models\UpdatesPanelContent`.
 */
class UpdatesPanelContentSearch extends UpdatesPanelContent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'update_id', 'updates_content_picture', 'updates_content_paragraph'], 'safe'],
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
        $query = UpdatesPanelContent::find();

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
            ->andFilterWhere(['like', 'update_id', $this->update_id])
            ->andFilterWhere(['like', 'updates_content_picture', $this->updates_content_picture])
            ->andFilterWhere(['like', 'updates_content_paragraph', $this->updates_content_paragraph]);

        return $dataProvider;
    }
}
