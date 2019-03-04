<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persetujuan_pendaftaran}}".
 *
 * @property int $idPersetujuanPendaftaran
 * @property int $idPendaftaran
 * @property int $idPersetujuan
 * @property string $status
 */
class PersetujuanPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%persetujuan_pendaftaran}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersetujuanPendaftaran'], 'required'],
            [['idPersetujuanPendaftaran', 'idPendaftaran', 'idPersetujuan'], 'integer'],
            [['status'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersetujuanPendaftaran' => 'Id Persetujuan Pendaftaran',
            'idPendaftaran' => 'Id Pendaftaran',
            'idPersetujuan' => 'Id Persetujuan',
            'status' => 'Status',
        ];
    }
}
