<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilai_master_skripsi}}".
 *
 * @property string $id_nm_skripsi
 * @property double $n_kompre
 * @property double $n_pra_sidang
 * @property double $n_sidang_skripsi
 * @property double $n_pembimbing
 * @property double $na
 * @property string $index
 * @property int $nim
 * @property int $id_pendaftaran
 * @property string $status
 * @property int $id_pengajuan
 *
 * @property Mahasiswa $nIM
 * @property Pendaftaran $pendaftaran
 * @property Pengajuan $pengajuan
 */
class NilaiMasterSkripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilai_master_skripsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['n_kompre', 'n_pra_sidang', 'n_sidang_skripsi', 'n_pembimbing', 'na'], 'number'],
            [['nim', 'status', 'id_pengajuan'], 'required'],
            [['nim', 'id_pendaftaran', 'id_pengajuan'], 'integer'],
            [['index'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 100],
            [['nim'], 'unique'],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
            [['id_pengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['id_pengajuan' => 'id_pengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nm_skripsi' => 'Id Nm Skripsi',
            'n_kompre' => 'N Kompre',
            'n_pra_sidang' => 'N Pra Sidang',
            'n_sidang_skripsi' => 'N Sidang Skripsi',
            'n_pembimbing' => 'N Pembimbing',
            'na' => 'Na',
            'index' => 'Index',
            'nim' => 'Nim',
            'id_pendaftaran' => 'Id Pendaftaran',
            'status' => 'Status',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['id_pengajuan' => 'id_pengajuan']);
    }
}
