<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan_jenis}}".
 *
 * @property int $idPersyaratanJenis
 * @property int $idJenisSidang
 * @property int $idPersyaratan
 *
 * @property Jenissidang $jenisSidang
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
            [['idJenisSidang', 'idPersyaratan'], 'integer'],
            [['idJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenissidang::className(), 'targetAttribute' => ['idJenisSidang' => 'IDJenisSidang']],
            [['idPersyaratan'], 'exist', 'skipOnError' => true, 'targetClass' => Persyaratan::className(), 'targetAttribute' => ['idPersyaratan' => 'idPersyaratan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratanJenis' => 'Id Persyaratan Jenis',
            'idJenisSidang' => 'Id Jenis Sidang',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(Jenissidang::className(), ['IDJenisSidang' => 'idJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratan()
    {
        return $this->hasOne(Persyaratan::className(), ['idPersyaratan' => 'idPersyaratan']);
    }
}
