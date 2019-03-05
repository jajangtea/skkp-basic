<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persetujuan}}".
 *
 * @property int $id_persetujuan
 * @property int $id_persyaratan_persetujuan
 * @property string $kode_dosen
 */
class Persetujuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%persetujuan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persetujuan'], 'required'],
            [['id_persetujuan', 'id_persyaratan_persetujuan'], 'integer'],
            [['kode_dosen'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_persetujuan' => 'Id Persetujuan',
            'id_persyaratan_persetujuan' => 'Id Persyaratan Persetujuan',
            'kode_dosen' => 'Kode Dosen',
        ];
    }
}
