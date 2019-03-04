<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pengajuan}}".
 *
 * @property int $IDPengajuan
 * @property int $IDJenisSidang
 * @property int $NIM
 * @property string $TanggalDaftar
 * @property string $Judul
 * @property string $keterangan
 * @property int $IDstatusProposal
 * @property int $idPeriode
 *
 * @property Nilaimasterskripsi[] $nilaimasterskripsis
 * @property Pembimbing[] $pembimbings
 * @property Pendaftaran[] $pendaftarans
 * @property Jenissidang $jenisSidang
 * @property Statusproposal $statusProposal
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
            [['IDJenisSidang', 'NIM', 'IDstatusProposal', 'idPeriode'], 'integer'],
            [['TanggalDaftar'], 'safe'],
            [['Judul', 'keterangan'], 'string'],
            [['idPeriode'], 'required'],
            [['IDJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenissidang::className(), 'targetAttribute' => ['IDJenisSidang' => 'IDJenisSidang']],
            [['IDstatusProposal'], 'exist', 'skipOnError' => true, 'targetClass' => Statusproposal::className(), 'targetAttribute' => ['IDstatusProposal' => 'idstatusProp']],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPengajuan' => 'Id Pengajuan',
            'IDJenisSidang' => 'Id Jenis Sidang',
            'NIM' => 'Nim',
            'TanggalDaftar' => 'Tanggal Daftar',
            'Judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'IDstatusProposal' => 'I Dstatus Proposal',
            'idPeriode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaimasterskripsis()
    {
        return $this->hasMany(Nilaimasterskripsi::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbings()
    {
        return $this->hasMany(Pembimbing::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(Jenissidang::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusProposal()
    {
        return $this->hasOne(Statusproposal::className(), ['idstatusProp' => 'IDstatusProposal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIM()
    {
        return $this->hasOne(Mahasiswa::className(), ['NIM' => 'NIM']);
    }
}
