<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pendaftaran}}".
 *
 * @property int $idPendaftaran
 * @property string $Tanggal
 * @property int $NIM
 * @property int $IdSidang
 * @property string $KodePembimbing1
 * @property string $KodePembimbing2
 * @property string $Judul
 * @property string $keterangan
 * @property int $idPengajuan
 *
 * @property Nilaidetilskirpsi[] $nilaidetilskirpsis
 * @property Nilaikp[] $nilaikps
 * @property Nilaimasterskripsi[] $nilaimasterskripsis
 * @property Mahasiswa $nIM
 * @property Sidangmaster $sidang
 * @property Dosen $kodePembimbing1
 * @property Dosen $kodePembimbing2
 * @property Pengajuan $pengajuan
 * @property Pengujikp[] $pengujikps
 * @property Pengujiskripsi[] $pengujiskripsis
 * @property Sidangdetil[] $sidangdetils
 */
class Pendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pendaftaran}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tanggal'], 'safe'],
            [['NIM', 'IdSidang', 'idPengajuan'], 'integer'],
            [['Judul'], 'string'],
            [['keterangan'], 'required'],
            [['KodePembimbing1', 'KodePembimbing2'], 'string', 'max' => 3],
            [['keterangan'], 'string', 'max' => 200],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['IdSidang'], 'exist', 'skipOnError' => true, 'targetClass' => Sidangmaster::className(), 'targetAttribute' => ['IdSidang' => 'IdSidang']],
            [['KodePembimbing1'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['KodePembimbing1' => 'KodeDosen']],
            [['KodePembimbing2'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['KodePembimbing2' => 'KodeDosen']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPendaftaran' => 'Id Pendaftaran',
            'Tanggal' => 'Tanggal',
            'NIM' => 'Nim',
            'IdSidang' => 'Id Sidang',
            'KodePembimbing1' => 'Kode Pembimbing1',
            'KodePembimbing2' => 'Kode Pembimbing2',
            'Judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'idPengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaidetilskirpsis()
    {
        return $this->hasMany(Nilaidetilskirpsi::className(), ['IdPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaikps()
    {
        return $this->hasMany(Nilaikp::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaimasterskripsis()
    {
        return $this->hasMany(Nilaimasterskripsi::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIM()
    {
        return $this->hasOne(Mahasiswa::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidang()
    {
        return $this->hasOne(Sidangmaster::className(), ['IdSidang' => 'IdSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing1()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'KodePembimbing1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing2()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'KodePembimbing2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujikps()
    {
        return $this->hasMany(Pengujikp::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiskripsis()
    {
        return $this->hasMany(Pengujiskripsi::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangdetils()
    {
        return $this->hasMany(Sidangdetil::className(), ['IdPendaftaran' => 'idPendaftaran']);
    }
}
