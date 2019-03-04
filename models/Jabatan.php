<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jabatan}}".
 *
 * @property int $IdJabatan
 * @property string $KodeDosen
 * @property string $IdJenisDosen
 *
 * @property Dosen $kodeDosen
 * @property Jenisdosen $jenisDosen
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jabatan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KodeDosen', 'IdJenisDosen'], 'string', 'max' => 3],
            [['KodeDosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['KodeDosen' => 'KodeDosen']],
            [['IdJenisDosen'], 'exist', 'skipOnError' => true, 'targetClass' => Jenisdosen::className(), 'targetAttribute' => ['IdJenisDosen' => 'IdJenisDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdJabatan' => 'Id Jabatan',
            'KodeDosen' => 'Kode Dosen',
            'IdJenisDosen' => 'Id Jenis Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisDosen()
    {
        return $this->hasOne(Jenisdosen::className(), ['IdJenisDosen' => 'IdJenisDosen']);
    }
}
