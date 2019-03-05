<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persyaratan_persetujuan}}".
 *
 * @property int $id_persyaratan_persetujuan
 * @property int $id_persyaratan
 * @property int $id_jenis_sidang
 * @property int $id_level
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
            [['id_persyaratan_persetujuan'], 'required'],
            [['id_persyaratan_persetujuan', 'id_persyaratan', 'id_jenis_sidang', 'id_level'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_persyaratan_persetujuan' => 'Id Persyaratan Persetujuan',
            'id_persyaratan' => 'Id Persyaratan',
            'id_jenis_sidang' => 'Id Jenis Sidang',
            'id_level' => 'Id Level',
        ];
    }
}
