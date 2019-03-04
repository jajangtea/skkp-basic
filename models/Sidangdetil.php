<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sidangdetil}}".
 *
 * @property int $IdSidangDetil
 * @property int $IdPendaftaran
 * @property string $Penguji1
 * @property string $Penguji2
 *
 * @property Pendaftaran $pendaftaran
 * @property Dosen $penguji1
 * @property Dosen $penguji2
 */
class Sidangdetil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sidangdetil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPendaftaran'], 'integer'],
            [['Penguji1', 'Penguji2'], 'string', 'max' => 20],
            [['IdPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['IdPendaftaran' => 'idPendaftaran']],
            [['Penguji1'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['Penguji1' => 'KodeDosen']],
            [['Penguji2'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['Penguji2' => 'KodeDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSidangDetil' => 'Id Sidang Detil',
            'IdPendaftaran' => 'Id Pendaftaran',
            'Penguji1' => 'Penguji1',
            'Penguji2' => 'Penguji2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['idPendaftaran' => 'IdPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguji1()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'Penguji1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguji2()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'Penguji2']);
    }
}
