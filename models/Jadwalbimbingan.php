<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jadwalbimbingan}}".
 *
 * @property int $idJadwalBimbingan
 * @property string $hari
 * @property string $jam
 * @property string $KodeDosen
 *
 * @property Dosen $kodeDosen
 */
class Jadwalbimbingan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jadwalbimbingan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari', 'jam'], 'string', 'max' => 200],
            [['KodeDosen'], 'string', 'max' => 3],
            [['KodeDosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['KodeDosen' => 'KodeDosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJadwalBimbingan' => 'Id Jadwal Bimbingan',
            'hari' => 'Hari',
            'jam' => 'Jam',
            'KodeDosen' => 'Kode Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(Dosen::className(), ['KodeDosen' => 'KodeDosen']);
    }
}
