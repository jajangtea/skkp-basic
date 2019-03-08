<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sidang_master}}".
 *
 * @property int $id_sidang
 * @property string $tanggal
 * @property int $id_jenis_sidang
 * @property int $id_ta
 * @property int $status
 * @property string $tgl_buka
 * @property string $tgl_tutup
 * @property int $id_periode
 *
 * @property Pendaftaran[] $pendaftarans
 * @property JenisSidang $jenisSidang
 * @property Ta $ta
 */
class SidangMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sidang_master}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'tgl_buka', 'tgl_tutup'], 'safe'],
            [['id_jenis_sidang', 'id_ta', 'status', 'id_periode'], 'integer'],
            [['id_periode'], 'required'],
            [['id_jenis_sidang'], 'exist', 'skipOnError' => true, 'targetClass' => JenisSidang::className(), 'targetAttribute' => ['id_jenis_sidang' => 'id_jenis_sidang']],
            [['id_ta'], 'exist', 'skipOnError' => true, 'targetClass' => Ta::className(), 'targetAttribute' => ['id_ta' => 'id_ta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sidang' => 'Id Sidang',
            'tanggal' => 'Tanggal',
            'id_jenis_sidang' => 'Id Jenis Sidang',
            'id_ta' => 'Id Ta',
            'status' => 'Status',
            'tgl_buka' => 'Tgl Buka',
            'tgl_tutup' => 'Tgl Tutup',
            'id_periode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['id_sidang' => 'id_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(JenisSidang::className(), ['id_jenis_sidang' => 'id_jenis_sidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTa()
    {
        return $this->hasOne(Ta::className(), ['id_ta' => 'id_ta']);
    }
}
