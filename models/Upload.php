<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%upload}}".
 *
 * @property int $id_upload
 * @property int $id_pendaftaran
 * @property string $nama_file
 * @property string $ukuran_fIle
 * @property int $id_persyaratan
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%upload}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'id_persyaratan'], 'integer'],
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
            'id_pendaftaran' => 'Id Pendaftaran',
            'nama_file' => 'Nama File',
            'ukuran_fIle' => 'Ukuran F Ile',
            'id_persyaratan' => 'Id Persyaratan',
        ];
    }
}
