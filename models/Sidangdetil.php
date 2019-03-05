<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sidang_detil}}".
 *
 * @property int $id_sidang_detil
 * @property int $id_pendaftaran
 * @property string $penguji1
 * @property string $penguji2
 *
 * @property Pendaftaran $pendaftaran
 * @property Dosen $penguji10
 * @property Dosen $penguji20
 */
class SidangDetil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sidang_detil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran'], 'integer'],
            [['penguji1', 'penguji2'], 'string', 'max' => 20],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
            [['Penguji1'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['Penguji1' => 'kode_dosen']],
            [['Penguji2'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['Penguji2' => 'kode_dosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sidang_detil' => 'Id Sidang Detil',
            'id_pendaftaran' => 'Id Pendaftaran',
            'penguji1' => 'Penguji1',
            'penguji2' => 'Penguji2',
        ];
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
    public function getPenguji10()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'Penguji1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenguji20()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'Penguji2']);
    }
}
