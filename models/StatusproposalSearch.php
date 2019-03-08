<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Statusproposal;

/**
 * StatusproposalSearch represents the model behind the search form of `app\models\Statusproposal`.
 */
class StatusproposalSearch extends Statusproposal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_status_proposal'], 'integer'],
            [['n_status_proposal'], 'safe'],
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
        $query = Statusproposal::find();

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
            'id_status_proposal' => $this->id_status_proposal,
        ]);

        $query->andFilterWhere(['like', 'n_status_proposal', $this->n_status_proposal]);

        return $dataProvider;
    }
}
