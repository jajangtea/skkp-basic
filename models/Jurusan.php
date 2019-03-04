<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jurusan}}".
 *
 * @property string $KodeJurusan
 * @property string $NamaJurusan
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
            [['KodeJurusan'], 'required'],
            [['KodeJurusan'], 'string', 'max' => 50],
            [['NamaJurusan'], 'string', 'max' => 100],
            [['KodeJurusan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeJurusan' => 'Kode Jurusan',
            'NamaJurusan' => 'Nama Jurusan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(Mahasiswa::className(), ['KodeJurusan' => 'KodeJurusan']);
    }
}
