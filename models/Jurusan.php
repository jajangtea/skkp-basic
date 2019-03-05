<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jurusan}}".
 *
 * @property string $kode_jurusan
 * @property string $nama_jurusan
 *
 * @property Mahasiswa[] $mahasiswas
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jurusan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_jurusan'], 'required'],
            [['kode_jurusan'], 'string', 'max' => 50],
            [['nama_jurusan'], 'string', 'max' => 100],
            [['kode_jurusan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_jurusan' => 'Kode Jurusan',
            'nama_jurusan' => 'Nama Jurusan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['kode_jurusan' => 'kode_jurusan']);
    }
}
