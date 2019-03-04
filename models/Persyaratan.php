<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan}}".
 *
 * @property int $idPersyaratan
 * @property string $namaPersyaratan
 *
 * @property PersyaratanJenis[] $persyaratanJenis
 */
class Persyaratan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%persyaratan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namaPersyaratan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratan' => 'Id Persyaratan',
            'namaPersyaratan' => 'Nama Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratanJenis()
    {
        return $this->hasMany(PersyaratanJenis::className(), ['idPersyaratan' => 'idPersyaratan']);
    }
}
