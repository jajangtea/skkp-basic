<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%upload_proposal}}".
 *
 * @property int $id_upload
 * @property int $id_pengajuan
 * @property string $nama_file
 * @property string $ukuran_fIle
 * @property int $id_persyaratan
 */
class UploadProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%upload_proposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengajuan', 'id_persyaratan'], 'integer'],
            [['nama_file', 'ukuran_fIle'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_upload' => 'Id Upload',
            'id_pengajuan' => 'Id Pengajuan',
            'nama_file' => 'Nama File',
            'ukuran_fIle' => 'Ukuran F Ile',
            'id_persyaratan' => 'Id Persyaratan',
        ];
    }
}
