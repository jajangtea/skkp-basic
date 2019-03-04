<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenisdosen}}".
 *
 * @property string $IdJenisDosen
 * @property string $NamaJenis
 *
 * @property Jabatan[] $jabatans
 */
class Jenisdosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenisdosen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdJenisDosen'], 'required'],
            [['IdJenisDosen'], 'string', 'max' => 3],
            [['NamaJenis'], 'string', 'max' => 50],
            [['IdJenisDosen'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdJenisDosen' => 'Id Jenis Dosen',
            'NamaJenis' => 'Nama Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['IdJenisDosen' => 'IdJenisDosen']);
    }
}
