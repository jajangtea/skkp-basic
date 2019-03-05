<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pendaftaran}}".
 *
 * @property int $id_pendaftaran
 * @property string $tanggal
 * @property int $nim
 * @property int $id_sidang
 * @property string $kode_pembimbing1
 * @property string $kode_pembimbing2
 * @property string $judul
 * @property string $keterangan
 * @property int $id_pengajuan
 *
 * @property NilaiDetilSkirpsi[] $nilaiDetilSkirpsis
 * @property NilaiKp[] $nilaiKps
 * @property NilaiMasterSkripsi[] $nilaiMasterSkripsis
 * @property Mahasiswa $nIM
 * @property SidangMaster $sidang
 * @property Dosen $kodePembimbing1
 * @property Dosen $kodePembimbing2
 * @property Pengajuan $pengajuan
 * @property PengujiKp[] $pengujiKps
 * @property PengujiSkripsi[] $pengujiSkripsis
 * @property SidangDetil[] $sidangDetils
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
            [['tanggal'], 'safe'],
            [['nim', 'id_sidang', 'id_pengajuan'], 'integer'],
            [['judul'], 'string'],
            [['keterangan'], 'required'],
            [['kode_pembimbing1', 'kode_pembimbing2'], 'string', 'max' => 3],
            [['keterangan'], 'string', 'max' => 200],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['id_sidang'], 'exist', 'skipOnError' => true, 'targetClass' => SidangMaster::className(), 'targetAttribute' => ['id_sidang' => 'id_sidang']],
            [['kode_pembimbing1'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['kode_pembimbing1' => 'kode_dosen']],
            [['kode_pembimbing2'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['kode_pembimbing2' => 'kode_dosen']],
            [['id_pengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['id_pengajuan' => 'id_pengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pendaftaran' => 'Id Pendaftaran',
            'tanggal' => 'Tanggal',
            'nim' => 'Nim',
            'id_sidang' => 'Id Sidang',
            'kode_pembimbing1' => 'Kode Pembimbing1',
            'kode_pembimbing2' => 'Kode Pembimbing2',
            'judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'id_pengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiDetilSkirpsis()
    {
        return $this->hasMany(NilaiDetilSkirpsi::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiKps()
    {
        return $this->hasMany(NilaiKp::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiMasterSkripsis()
    {
        return $this->hasMany(NilaiMasterSkripsi::className(), ['id_pendaftaran' => 'id_pendaftaran']);
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
        return $this->hasOne(SidangMaster::className(), ['id_sidang' => 'id_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing1()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'kode_pembimbing1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing2()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'kode_pembimbing2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['id_pengajuan' => 'id_pengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiKps()
    {
        return $this->hasMany(PengujiKp::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiSkripsis()
    {
        return $this->hasMany(PengujiSkripsi::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangDetils()
    {
        return $this->hasMany(SidangDetil::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }
}
