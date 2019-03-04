<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%upload}}".
 *
 * @property int $idUpload
 * @property int $idPendaftaran
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property int $idPersyaratan
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
            [['idPendaftaran', 'idPersyaratan'], 'integer'],
            [['namaFile', 'ukuranFIle'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUpload' => 'Id Upload',
            'idPendaftaran' => 'Id Pendaftaran',
            'namaFile' => 'Nama File',
            'ukuranFIle' => 'Ukuran F Ile',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }
}
