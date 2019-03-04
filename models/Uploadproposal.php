<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%uploadproposal}}".
 *
 * @property int $idUpload
 * @property int $idPengajuan
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property int $idPersyaratan
 */
class Uploadproposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%uploadproposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPengajuan', 'idPersyaratan'], 'integer'],
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
            'idPengajuan' => 'Id Pengajuan',
            'namaFile' => 'Nama File',
            'ukuranFIle' => 'Ukuran F Ile',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }
}
