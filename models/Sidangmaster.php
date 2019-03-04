<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sidangmaster}}".
 *
 * @property int $IdSidang
 * @property string $Tanggal
 * @property int $IDJenisSidang
 * @property int $IdTa
 * @property int $status
 * @property string $tglBuka
 * @property string $tglTutup
 * @property int $idPeriode
 *
 * @property Pendaftaran[] $pendaftarans
 * @property Jenissidang $jenisSidang
 * @property Ta $ta
 */
class Sidangmaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sidangmaster}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tanggal', 'tglBuka', 'tglTutup'], 'safe'],
            [['IDJenisSidang', 'IdTa', 'status', 'idPeriode'], 'integer'],
            [['idPeriode'], 'required'],
            [['IDJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => Jenissidang::className(), 'targetAttribute' => ['IDJenisSidang' => 'IDJenisSidang']],
            [['IdTa'], 'exist', 'skipOnError' => true, 'targetClass' => Ta::className(), 'targetAttribute' => ['IdTa' => 'IdTa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSidang' => 'Id Sidang',
            'Tanggal' => 'Tanggal',
            'IDJenisSidang' => 'Id Jenis Sidang',
            'IdTa' => 'Id Ta',
            'status' => 'Status',
            'tglBuka' => 'Tgl Buka',
            'tglTutup' => 'Tgl Tutup',
            'idPeriode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['IdSidang' => 'IdSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(Jenissidang::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTa()
    {
        return $this->hasOne(Ta::className(), ['IdTa' => 'IdTa']);
    }
}
