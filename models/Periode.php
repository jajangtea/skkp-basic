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
class Periode extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%periode}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl_periode', 'tgl_pencairan'], 'safe'],
            [['tgl', 'bulan', 'tahun'], 'string', 'max' => 4],
            [['status_vakasi'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_periode' => 'Id Periode',
            'tgl' => 'Tanggal',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tgl_periode' => 'Tgl Periode',
            'status_vakasi' => 'Status Vakasi',
            'tgl_pencairan' => 'Tgl Pencairan',
        ];
    }

    public static function getNamaBulan($model) {
        if ($model == 1) {
            return "Januari";
        } elseif ($model == 2) {
            return "Februari";
        } elseif ($model == 3) {
            return "Maret";
        } elseif ($model == 4) {
            return "April";
        } elseif ($model == 5) {
            return "Mei";
        } elseif ($model == 6) {
            return "Juni";
        } elseif ($model == 7) {
            return "Juli";
        } elseif ($model == 8) {
            return "Agustus";
        } elseif ($model == 9) {
            return "September";
        } elseif ($model == 10) {
            return "Oktober";
        } elseif ($model == 11) {
            return "November";
        } elseif ($model == 12) {
            return "Desember";
        }
    }

    public static function getNumOfMonth() {
        $todayMonth = date("m");
        $todayYear = date("y");
        $number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31
        for ($i = 1; $i < $number; $i++) {
            $no = array_map('intval', str_split($i));
            return $no;
        }
    }

}
