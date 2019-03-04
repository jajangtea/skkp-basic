<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilaimasterskripsi}}".
 *
 * @property string $IdNMSkripsi
 * @property double $NKompre
 * @property double $NPraSidang
 * @property double $NSidangSkripsi
 * @property double $NPembimbing
 * @property double $NA
 * @property string $Index
 * @property int $NIM
 * @property int $idPendaftaran
 * @property string $status
 * @property int $idPengajuan
 *
 * @property Mahasiswa $nIM
 * @property Pendaftaran $pendaftaran
 * @property Pengajuan $pengajuan
 */
class Nilaimasterskripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilaimasterskripsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NKompre', 'NPraSidang', 'NSidangSkripsi', 'NPembimbing', 'NA'], 'number'],
            [['NIM', 'status', 'idPengajuan'], 'required'],
            [['NIM', 'idPendaftaran', 'idPengajuan'], 'integer'],
            [['Index'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 100],
            [['NIM'], 'unique'],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNMSkripsi' => 'Id Nm Skripsi',
            'NKompre' => 'N Kompre',
            'NPraSidang' => 'N Pra Sidang',
            'NSidangSkripsi' => 'N Sidang Skripsi',
            'NPembimbing' => 'N Pembimbing',
            'NA' => 'Na',
            'Index' => 'Index',
            'NIM' => 'Nim',
            'idPendaftaran' => 'Id Pendaftaran',
            'status' => 'Status',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }
}
