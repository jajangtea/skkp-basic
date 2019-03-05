<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%periode}}".
 *
 * @property int $id_periode
 * @property string $tgl
 * @property string $bulan
 * @property string $tahun
 * @property string $tgl_periode
 * @property string $status_vakasi
 * @property string $tgl_pencairan
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
            [['tgl_periode', 'tgl_pencairan'], 'safe'],
            [['tgl', 'bulan', 'tahun'], 'string', 'max' => 4],
            [['status_vakasi'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_periode' => 'Id Periode',
            'tgl' => 'Tgl',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tgl_periode' => 'Tgl Periode',
            'status_vakasi' => 'Status Vakasi',
            'tgl_pencairan' => 'Tgl Pencairan',
        ];
    }
}
