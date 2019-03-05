<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan}}".
 *
 * @property int $id_persyaratan
 * @property string $nama_persyaratan
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
            [['nama_persyaratan'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_persyaratan' => 'Id Persyaratan',
            'nama_persyaratan' => 'Nama Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratanJenis()
    {
        return $this->hasMany(PersyaratanJenis::className(), ['id_persyaratan' => 'id_persyaratan']);
    }
}
