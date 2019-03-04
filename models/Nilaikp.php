<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilaikp}}".
 *
 * @property int $IdNilaiKp
 * @property int $NIM
 * @property double $NilaiPembimbing
 * @property double $NilaiPenguji
 * @property double $NilaiPerusahaan
 * @property double $NA
 * @property string $Index
 * @property int $idPendaftaran
 * @property int $idPengajuan
 *
 * @property Mahasiswa $nIM
 * @property Pendaftaran $pendaftaran
 */
class Nilaikp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilaikp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIM', 'idPendaftaran', 'idPengajuan'], 'integer'],
            [['NilaiPembimbing', 'NilaiPenguji', 'NilaiPerusahaan', 'NA'], 'number'],
            [['idPendaftaran', 'idPengajuan'], 'required'],
            [['Index'], 'string', 'max' => 2],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNilaiKp' => 'Id Nilai Kp',
            'NIM' => 'Nim',
            'NilaiPembimbing' => 'Nilai Pembimbing',
            'NilaiPenguji' => 'Nilai Penguji',
            'NilaiPerusahaan' => 'Nilai Perusahaan',
            'NA' => 'Na',
            'Index' => 'Index',
            'idPendaftaran' => 'Id Pendaftaran',
            'idPengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIM()
    {
        return $this->hasOne(Mahasiswa::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['idPendaftaran' => 'idPendaftaran']);
    }
}
