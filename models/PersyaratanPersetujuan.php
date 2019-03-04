<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan_persetujuan}}".
 *
 * @property int $idPersyaratanPersetujuan
 * @property int $idPersyaratan
 * @property int $idJenisSidang
 * @property int $idLevel
 */
class PersyaratanPersetujuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%persyaratan_persetujuan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersyaratanPersetujuan'], 'required'],
            [['idPersyaratanPersetujuan', 'idPersyaratan', 'idJenisSidang', 'idLevel'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
            'idPersyaratan' => 'Id Persyaratan',
            'idJenisSidang' => 'Id Jenis Sidang',
            'idLevel' => 'Id Level',
        ];
    }
}
