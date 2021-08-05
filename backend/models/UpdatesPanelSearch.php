<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UpdatesPanel;

/**
 * UpdatesPanelSearch represents the model behind the search form of `backend\models\UpdatesPanel`.
 */
class UpdatesPanelSearch extends UpdatesPanel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'updates_title'], 'safe'],
            [['updates_hide'], 'boolean'],
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
        $query = UpdatesPanel::find();

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
            'updates_hide' => $this->updates_hide,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'updates_title', $this->updates_title]);

        return $dataProvider;
    }
}
