<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan_jenis}}".
 *
 * @property int $id_persyaratanJenis
 * @property int $id_jenis_sidang
 * @property int $id_persyaratan
 *
 * @property JenisSidang $jenisSidang
 * @property Persyaratan $persyaratan
 */
class PersyaratanJenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%persyaratan_jenis}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_sidang', 'id_persyaratan'], 'integer'],
            [['id_jenis_sidang'], 'exist', 'skipOnError' => true, 'targetClass' => JenisSidang::className(), 'targetAttribute' => ['id_jenis_sidang' => 'id_jenis_sidang']],
            [['id_persyaratan'], 'exist', 'skipOnError' => true, 'targetClass' => Persyaratan::className(), 'targetAttribute' => ['id_persyaratan' => 'id_persyaratan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_persyaratanJenis' => 'Id Persyaratan Jenis',
            'id_jenis_sidang' => 'Id Jenis Sidang',
            'id_persyaratan' => 'Id Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(JenisSidang::className(), ['id_jenis_sidang' => 'id_jenis_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratan()
    {
        return $this->hasOne(Persyaratan::className(), ['id_persyaratan' => 'id_persyaratan']);
    }
}
