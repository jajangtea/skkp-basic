<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%penguji_skripsi}}".
 *
 * @property int $id_penguji_skripsi
 * @property int $id_pendaftaran
 * @property int $id_user
 * @property double $nilai
 * @property int $id_pengajuan
 *
 * @property NilaiPenguji[] $nilaiPengujis
 * @property Pendaftaran $pendaftaran
 * @property User $user
 */
class PengujiSkripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%penguji_skripsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'id_user', 'id_pengajuan'], 'integer'],
            [['nilai', 'id_pengajuan'], 'required'],
            [['nilai'], 'number'],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penguji_skripsi' => 'Id Penguji Skripsi',
            'id_pendaftaran' => 'Id Pendaftaran',
            'id_user' => 'Id User',
            'nilai' => 'Nilai',
            'id_pengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiPengujis()
    {
        return $this->hasMany(NilaiPenguji::className(), ['id_penguji_skripsi' => 'id_penguji_skripsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
