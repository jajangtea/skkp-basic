<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mahasiswa}}".
 *
 * @property int $nim
 * @property string $nama
 * @property string $tlp
 * @property string $kode_jurusan
 * @property int $id_user
 *
 * @property Jurusan $kodeJurusan
 * @property User $user
 * @property NilaiKp[] $nilaiKps
 * @property NilaiMasterSkripsi[] $nilaiMasterSkripsis
 * @property Pendaftaran[] $pendaftarans
 * @property Pengajuan[] $pengajuans
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mahasiswa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim'], 'required'],
            [['nim', 'id_user'], 'integer'],
            [['nama'], 'string', 'max' => 200],
            [['tlp'], 'string', 'max' => 20],
            [['kode_jurusan'], 'string', 'max' => 50],
            [['nim'], 'unique'],
            [['kode_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['kode_jurusan' => 'kode_jurusan']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama' => 'Nama',
            'tlp' => 'Tlp',
            'kode_jurusan' => 'Kode Jurusan',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['kode_jurusan' => 'kode_jurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiKps()
    {
        return $this->hasMany(NilaiKp::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiMasterSkripsis()
    {
        return $this->hasMany(NilaiMasterSkripsi::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['NIM' => 'NIM']);
    }
}
