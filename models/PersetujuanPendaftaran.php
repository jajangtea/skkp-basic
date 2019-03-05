<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persetujuan_pendaftaran}}".
 *
 * @property int $id_persetujuan_pendaftaran
 * @property int $id_pendaftaran
 * @property int $id_persetujuan
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
            [['id_persetujuan_pendaftaran'], 'required'],
            [['id_persetujuan_pendaftaran', 'id_pendaftaran', 'id_persetujuan'], 'integer'],
            [['status'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_persetujuan_pendaftaran' => 'Id Persetujuan Pendaftaran',
            'id_pendaftaran' => 'Id Pendaftaran',
            'id_persetujuan' => 'Id Persetujuan',
            'status' => 'Status',
        ];
    }
}
