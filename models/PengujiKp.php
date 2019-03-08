<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%penguji_kp}}".
 *
 * @property int $id_penguji_kp
 * @property int $id_pendaftaran
 * @property int $id_user
 *
 * @property Pendaftaran $pendaftaran
 * @property User $user
 */
class PengujiKp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%penguji_kp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'id_user'], 'integer'],
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
            'id_penguji_kp' => 'Id Penguji Kp',
            'id_pendaftaran' => 'Id Pendaftaran',
            'id_user' => 'Id User',
        ];
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
