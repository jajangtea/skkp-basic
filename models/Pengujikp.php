<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pengujikp}}".
 *
 * @property int $idPengujiKp
 * @property int $idPendaftaran
 * @property int $idUser
 *
 * @property Pendaftaran $pendaftaran
 * @property User $user
 */
class Pengujikp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pengujikp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPendaftaran', 'idUser'], 'integer'],
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
            'idPengujiKp' => 'Id Penguji Kp',
            'idPendaftaran' => 'Id Pendaftaran',
            'idUser' => 'Id User',
        ];
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
