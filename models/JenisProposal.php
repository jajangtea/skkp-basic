<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenis_proposal}}".
 *
 * @property int $id_jenis_sidang
 * @property string $nama_sidang
 */
class JenisProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis_proposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_sidang'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_sidang' => 'Id Jenis Sidang',
            'nama_sidang' => 'Nama Sidang',
        ];
    }
}
