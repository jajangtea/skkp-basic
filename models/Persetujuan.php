<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persetujuan}}".
 *
 * @property int $idPersetujuan
 * @property int $idPersyaratanPersetujuan
 * @property string $kodeDosen
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
            [['idPersetujuan'], 'required'],
            [['idPersetujuan', 'idPersyaratanPersetujuan'], 'integer'],
            [['kodeDosen'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersetujuan' => 'Id Persetujuan',
            'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
            'kodeDosen' => 'Kode Dosen',
        ];
    }
}
