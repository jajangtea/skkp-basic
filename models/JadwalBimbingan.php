<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jadwal_bimbingan}}".
 *
 * @property int $id_jadwal_bimbingan
 * @property string $hari
 * @property string $jam
 * @property string $kode_dosen
 *
 * @property Dosen $kodeDosen
 */
class JadwalBimbingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jadwal_bimbingan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari', 'jam'], 'string', 'max' => 200],
            [['kode_dosen'], 'string', 'max' => 3],
            [['kode_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['kode_dosen' => 'kode_dosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal_bimbingan' => 'Id Jadwal Bimbingan',
            'hari' => 'Hari',
            'jam' => 'Jam',
            'kode_dosen' => 'Kode Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'kode_dosen']);
    }
}
