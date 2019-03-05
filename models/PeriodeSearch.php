<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Periode;

/**
 * PeriodeSearch represents the model behind the search form of `app\models\Periode`.
 */
class PeriodeSearch extends Periode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_periode'], 'integer'],
            [['tgl', 'bulan', 'tahun', 'tgl_periode', 'status_vakasi', 'tgl_pencairan'], 'safe'],
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
        $query = Periode::find();

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
            'id_periode' => $this->id_periode,
            'tgl_periode' => $this->tgl_periode,
            'tgl_pencairan' => $this->tgl_pencairan,
        ]);

        $query->andFilterWhere(['like', 'tgl', $this->tgl])
            ->andFilterWhere(['like', 'bulan', $this->bulan])
            ->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'status_vakasi', $this->status_vakasi]);

        return $dataProvider;
    }
}
