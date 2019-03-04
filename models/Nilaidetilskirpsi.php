<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilaidetilskirpsi}}".
 *
 * @property int $idNilaiSkripsi
 * @property int $IdPendaftaran
 * @property double $NilaiPenguji1
 * @property double $NIlaiPenguji2
 * @property double $NPraSidang
 *
 * @property Pendaftaran $pendaftaran
 */
class Nilaidetilskirpsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilaidetilskirpsi}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPendaftaran'], 'integer'],
            [['NilaiPenguji1', 'NIlaiPenguji2', 'NPraSidang'], 'number'],
            [['IdPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['IdPendaftaran' => 'idPendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNilaiSkripsi' => 'Id Nilai Skripsi',
            'IdPendaftaran' => 'Id Pendaftaran',
            'NilaiPenguji1' => 'Nilai Penguji1',
            'NIlaiPenguji2' => 'N Ilai Penguji2',
            'NPraSidang' => 'N Pra Sidang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['idPendaftaran' => 'IdPendaftaran']);
    }
}
