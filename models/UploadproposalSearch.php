<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Uploadproposal;

/**
 * UploadproposalSearch represents the model behind the search form of `app\models\Uploadproposal`.
 */
class UploadproposalSearch extends Uploadproposal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_upload', 'id_pengajuan', 'id_persyaratan'], 'integer'],
            [['nama_file', 'ukuran_fIle'], 'safe'],
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
        $query = Uploadproposal::find();

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
            'id_upload' => $this->id_upload,
            'id_pengajuan' => $this->id_pengajuan,
            'id_persyaratan' => $this->id_persyaratan,
        ]);

        $query->andFilterWhere(['like', 'nama_file', $this->nama_file])
            ->andFilterWhere(['like', 'ukuran_fIle', $this->ukuran_fIle]);

        return $dataProvider;
    }
}
