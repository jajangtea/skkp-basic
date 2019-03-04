<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%dosen}}".
 *
 * @property string $KodeDosen
 * @property string $NamaDosen
 * @property string $Tlp
 * @property int $IdUser
 *
 * @property User $user
 * @property Jabatan[] $jabatans
 * @property Jadwalbimbingan[] $jadwalbimbingans
 * @property Pendaftaran[] $pendaftarans
 * @property Pendaftaran[] $pendaftarans0
 * @property Sidangdetil[] $sidangdetils
 * @property Sidangdetil[] $sidangdetils0
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
            [['KodeDosen'], 'required'],
            [['IdUser'], 'integer'],
            [['KodeDosen'], 'string', 'max' => 3],
            [['NamaDosen'], 'string', 'max' => 200],
            [['Tlp'], 'string', 'max' => 20],
            [['KodeDosen'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeDosen' => 'Kode Dosen',
            'NamaDosen' => 'Nama Dosen',
            'Tlp' => 'Tlp',
            'IdUser' => 'Id User',
        ];
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
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalbimbingans()
    {
        return $this->hasMany(Jadwalbimbingan::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['KodePembimbing1' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans0()
    {
        return $this->hasMany(Pendaftaran::className(), ['KodePembimbing2' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangdetils()
    {
        return $this->hasMany(Sidangdetil::className(), ['Penguji1' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangdetils0()
    {
        return $this->hasMany(Sidangdetil::className(), ['Penguji2' => 'KodeDosen']);
    }
}
