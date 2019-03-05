<?php

namespace app\modules\admin;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ta;

/**
 * TaSearch represents the model behind the search form of `app\models\Ta`.
 */
class TaSearch extends Ta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ta'], 'integer'],
            [['tahun', 'semester'], 'safe'],
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
        $query = Ta::find();

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
            'id_ta' => $this->id_ta,
        ]);

        $query->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'semester', $this->semester]);

        return $dataProvider;
    }
}
