<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenis_dosen}}".
 *
 * @property string $id_jenis_dosen
 * @property string $nama_jenis
 *
 * @property Jabatan[] $jabatans
 */
class JenisDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis_dosen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_dosen'], 'required'],
            [['id_jenis_dosen'], 'string', 'max' => 3],
            [['nama_jenis'], 'string', 'max' => 50],
            [['id_jenis_dosen'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_dosen' => 'Id Jenis Dosen',
            'nama_jenis' => 'Nama Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['id_jenis_dosen' => 'id_jenis_dosen']);
    }
}
