<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dosen}}".
 *
 * @property string $kode_dosen
 * @property string $nama_dosen
 * @property string $tlp
 * @property int $id_user
 *
 * @property User $user
 * @property Jabatan[] $jabatans
 * @property JadwalBimbingan[] $jadwalBimbingans
 * @property Pendaftaran[] $pendaftarans
 * @property Pendaftaran[] $pendaftarans0
 * @property SidangDetil[] $sidangDetils
 * @property SidangDetil[] $sidangDetils0
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dosen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_dosen'], 'required'],
            [['id_user'], 'integer'],
            [['kode_dosen'], 'string', 'max' => 3],
            [['nama_dosen'], 'string', 'max' => 200],
            [['tlp'], 'string', 'max' => 20],
            [['kode_dosen'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_dosen' => 'Kode Dosen',
            'nama_dosen' => 'Nama Dosen',
            'tlp' => 'Tlp',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['kode_dosen' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalBimbingans()
    {
        return $this->hasMany(JadwalBimbingan::className(), ['kode_dosen' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['kode_pembimbing1' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans0()
    {
        return $this->hasMany(Pendaftaran::className(), ['kode_pembimbing2' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangDetils()
    {
        return $this->hasMany(SidangDetil::className(), ['Penguji1' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangDetils0()
    {
        return $this->hasMany(SidangDetil::className(), ['Penguji2' => 'kode_dosen']);
    }
}
