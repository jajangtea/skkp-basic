<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenis_sidang}}".
 *
 * @property int $id_jenis_sidang
 * @property string $nama_sidang
 * @property double $nominal_vakasi
 *
 * @property Pengajuan[] $pengajuans
 * @property PersyaratanJenis[] $persyaratanJenis
 * @property SidangMaster[] $sidangMasters
 */
class JenisSidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis_sidang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_sidang', 'nominal_vakasi'], 'required'],
            [['id_jenis_sidang'], 'integer'],
            [['nominal_vakasi'], 'number'],
            [['nama_sidang'], 'string', 'max' => 50],
            [['id_jenis_sidang'], 'unique'],
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
            'nominal_vakasi' => 'Nominal Vakasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['id_jenis_proposal' => 'id_jenis_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratanJenis()
    {
        return $this->hasMany(PersyaratanJenis::className(), ['id_jenis_sidang' => 'id_jenis_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangMasters()
    {
        return $this->hasMany(SidangMaster::className(), ['id_jenis_sidang' => 'id_jenis_sidang']);
    }
}
