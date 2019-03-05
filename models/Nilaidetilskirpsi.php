<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilai_detil_skirpsi}}".
 *
 * @property int $id_nilai_skripsi
 * @property int $id_pendaftaran
 * @property double $nilai_penguji1
 * @property double $nIlai_penguji2
 * @property double $npra_sidang
 *
 * @property Pendaftaran $pendaftaran
 */
class NilaiDetilSkirpsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilai_detil_skirpsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran'], 'integer'],
            [['nilai_penguji1', 'nIlai_penguji2', 'npra_sidang'], 'number'],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_skripsi' => 'Id Nilai Skripsi',
            'id_pendaftaran' => 'Id Pendaftaran',
            'nilai_penguji1' => 'Nilai Penguji1',
            'nIlai_penguji2' => 'N Ilai Penguji2',
            'npra_sidang' => 'Npra Sidang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }
}
