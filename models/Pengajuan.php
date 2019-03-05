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
 * @property JenisSidang $jenisProposal
 * @property StatusProposal $statusProposal
 * @property Mahasiswa $nIM
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
            [['id_jenis_proposal'], 'exist', 'skipOnError' => true, 'targetClass' => JenisSidang::className(), 'targetAttribute' => ['id_jenis_proposal' => 'id_jenis_sidang']],
            [['id_status_proposal'], 'exist', 'skipOnError' => true, 'targetClass' => StatusProposal::className(), 'targetAttribute' => ['id_status_proposal' => 'id_status_proposal']],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
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
    public function getJenisProposal()
    {
        return $this->hasOne(JenisSidang::className(), ['id_jenis_sidang' => 'id_jenis_proposal']);
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
    public function getNIM()
    {
        return $this->hasOne(Mahasiswa::className(), ['NIM' => 'NIM']);
    }
}
