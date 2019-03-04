<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mahasiswa}}".
 *
 * @property int $NIM
 * @property string $Nama
 * @property string $Tlp
 * @property string $KodeJurusan
 * @property int $IdUser
 *
 * @property Jurusan $kodeJurusan
 * @property User $user
 * @property Nilaikp[] $nilaikps
 * @property Nilaimasterskripsi $nilaimasterskripsi
 * @property Pendaftaran[] $pendaftarans
 * @property Pengajuan[] $pengajuans
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mahasiswa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIM'], 'required'],
            [['NIM', 'IdUser'], 'integer'],
            [['Nama'], 'string', 'max' => 200],
            [['Tlp'], 'string', 'max' => 20],
            [['KodeJurusan'], 'string', 'max' => 50],
            [['NIM'], 'unique'],
            [['KodeJurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['KodeJurusan' => 'KodeJurusan']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIM' => 'Nim',
            'Nama' => 'Nama',
            'Tlp' => 'Tlp',
            'KodeJurusan' => 'Kode Jurusan',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['KodeJurusan' => 'KodeJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaikps()
    {
        return $this->hasMany(Nilaikp::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaimasterskripsi()
    {
        return $this->hasOne(Nilaimasterskripsi::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['NIM' => 'NIM']);
    }
}
