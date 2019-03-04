<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%periode}}".
 *
 * @property int $idPeriode
 * @property string $tgl
 * @property string $bulan
 * @property string $tahun
 * @property string $tglPeriode
 * @property string $statusVakasi
 * @property string $tglPencairan
 */
class Periode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%periode}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tglPeriode', 'tglPencairan'], 'safe'],
            [['tgl', 'bulan', 'tahun'], 'string', 'max' => 4],
            [['statusVakasi'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPeriode' => 'Id Periode',
            'tgl' => 'Tgl',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tglPeriode' => 'Tgl Periode',
            'statusVakasi' => 'Status Vakasi',
            'tglPencairan' => 'Tgl Pencairan',
        ];
    }
}
