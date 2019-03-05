<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajuan;

/**
 * PengajuanSearch represents the model behind the search form of `app\models\Pengajuan`.
 */
class PengajuanSearch extends Pengajuan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengajuan', 'id_jenis_proposal', 'nim', 'id_status_proposal', 'id_periode'], 'integer'],
            [['tanggal_daftar', 'judul', 'keterangan'], 'safe'],
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
        $query = Pengajuan::find();

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
            'id_pengajuan' => $this->id_pengajuan,
            'id_jenis_proposal' => $this->id_jenis_proposal,
            'nim' => $this->nim,
            'tanggal_daftar' => $this->tanggal_daftar,
            'id_status_proposal' => $this->id_status_proposal,
            'id_periode' => $this->id_periode,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
