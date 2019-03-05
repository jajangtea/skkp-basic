<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pengajuan}}".
 *
 * @property int $id_pengajuan
 * @property int $id_jenis_proposal
 * @property int $nim
 * @property string $tanggal_daftar
 * @property string $judul
 * @property string $keterangan
 * @property int $id_status_proposal
 * @property int $id_periode
 *
 * @property NilaiMasterSkripsi[] $nilaiMasterSkripsis
 * @property Pembimbing[] $pembimbings
 * @property Pendaftaran[] $pendaftarans
 * @property StatusProposal $statusProposal
 * @property JenisProposal $jenisProposal
 */
class Pengajuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pengajuan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_proposal', 'nim', 'id_status_proposal', 'id_periode'], 'integer'],
            [['tanggal_daftar'], 'safe'],
            [['judul', 'keterangan'], 'string'],
            [['id_periode'], 'required'],
            [['id_status_proposal'], 'exist', 'skipOnError' => true, 'targetClass' => StatusProposal::className(), 'targetAttribute' => ['id_status_proposal' => 'id_status_proposal']],
            [['id_jenis_proposal'], 'exist', 'skipOnError' => true, 'targetClass' => JenisProposal::className(), 'targetAttribute' => ['id_jenis_proposal' => 'id_jenis_proposal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengajuan' => 'Id Pengajuan',
            'id_jenis_proposal' => 'Id Jenis Proposal',
            'nim' => 'Nim',
            'tanggal_daftar' => 'Tanggal Daftar',
            'judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'id_status_proposal' => 'Id Status Proposal',
            'id_periode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiMasterSkripsis()
    {
        return $this->hasMany(NilaiMasterSkripsi::className(), ['id_pengajuan' => 'id_pengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbings()
    {
        return $this->hasMany(Pembimbing::className(), ['id_pengajuan' => 'id_pengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['id_pengajuan' => 'id_pengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusProposal()
    {
        return $this->hasOne(StatusProposal::className(), ['id_status_proposal' => 'id_status_proposal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisProposal()
    {
        return $this->hasOne(JenisProposal::className(), ['id_jenis_proposal' => 'id_jenis_proposal']);
    }
}
