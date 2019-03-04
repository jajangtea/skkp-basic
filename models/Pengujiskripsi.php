<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pengujiskripsi}}".
 *
 * @property int $idPengujiSkripsi
 * @property int $idPendaftaran
 * @property int $idUser
 * @property double $nilai
 * @property int $idPengajuan
 *
 * @property NilaiPenguji[] $nilaiPengujis
 * @property Pendaftaran $pendaftaran
 * @property User $user
 */
class Pengujiskripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pengujiskripsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPendaftaran', 'idUser', 'idPengajuan'], 'integer'],
            [['nilai', 'idPengajuan'], 'required'],
            [['nilai'], 'number'],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPengujiSkripsi' => 'Id Penguji Skripsi',
            'idPendaftaran' => 'Id Pendaftaran',
            'idUser' => 'Id User',
            'nilai' => 'Nilai',
            'idPengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiPengujis()
    {
        return $this->hasMany(NilaiPenguji::className(), ['idPengujiSkripsi' => 'idPengujiSkripsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
