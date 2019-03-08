<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
class Periode extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function tableName() {
        return '{{%periode}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['tgl', 'bulan', 'tahun'], 'required'],
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
            'created_at' => 'Dibuat Tanggal',
            'updated_at' => 'Diubah Tanggal',
            'status_vakasi' => 'Status Vakasi',
            'tgl_pencairan' => 'Tgl Pencairan',
        ];
    }

    public static function getNamaBulan($model) {
        if ($model == "01") {
            return "Januari";
        } elseif ($model == "02") {
            return "Februari";
        } elseif ($model == "03") {
            return "Maret";
        } elseif ($model == "04") {
            return "April";
        } elseif ($model == "05") {
            return "Mei";
        } elseif ($model == "06") {
            return "Juni";
        } elseif ($model == "07") {
            return "Juli";
        } elseif ($model == "08") {
            return "Agustus";
        } elseif ($model == "09") {
            return "September";
        } elseif ($model == "10") {
            return "Oktober";
        } elseif ($model == "11") {
            return "November";
        } elseif ($model == "12") {
            return "Desember";
        }
    }

    public static function getNoBulan($model) {
        if ($model == "01") {
            return "Januari";
        } elseif ($model == "02") {
            return "Februari";
        } elseif ($model == "03") {
            return "Maret";
        } elseif ($model == "04") {
            return "April";
        } elseif ($model == "05") {
            return "Mei";
        } elseif ($model == "06") {
            return "Juni";
        } elseif ($model == "07") {
            return "Juli";
        } elseif ($model == "08") {
            return "Agustus";
        } elseif ($model == "09") {
            return "September";
        } elseif ($model == "10") {
            return "Oktober";
        } elseif ($model == "11") {
            return "November";
        } elseif ($model == "12") {
            return "Desember";
        }
    }

    public static function getNumOfMonth() {
        $todayMonth = date("m");
        $todayYear = date("y");
        $number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31
        for ($i = 1; $i < $number; $i++) {
            return $i;
        }
    }

}
