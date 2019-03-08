<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilai_kp}}".
 *
 * @property int $id_nilai_kp
 * @property int $nim
 * @property double $nilai_pembimbing
 * @property double $nilai_penguji
 * @property double $nilai_perusahaan
 * @property double $na
 * @property string $index
 * @property int $id_pendaftaran
 * @property int $id_pengajuan
 *
 * @property Mahasiswa $nIM
 * @property Pendaftaran $pendaftaran
 */
class NilaiKp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilai_kp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'id_pendaftaran', 'id_pengajuan'], 'integer'],
            [['nilai_pembimbing', 'nilai_penguji', 'nilai_perusahaan', 'na'], 'number'],
            [['id_pendaftaran', 'id_pengajuan'], 'required'],
            [['index'], 'string', 'max' => 2],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_kp' => 'Id Nilai Kp',
            'nim' => 'Nim',
            'nilai_pembimbing' => 'Nilai Pembimbing',
            'nilai_penguji' => 'Nilai Penguji',
            'nilai_perusahaan' => 'Nilai Perusahaan',
            'na' => 'Na',
            'index' => 'Index',
            'id_pendaftaran' => 'Id Pendaftaran',
            'id_pengajuan' => 'Id Pengajuan',
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
        return $this->hasOne(Pendaftaran::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }
}
