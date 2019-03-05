<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jabatan}}".
 *
 * @property int $id_jabatan
 * @property string $kode_dosen
 * @property string $id_jenis_dosen
 *
 * @property Dosen $kodeDosen
 * @property JenisDosen $jenisDosen
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jabatan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_dosen', 'id_jenis_dosen'], 'string', 'max' => 3],
            [['kode_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['kode_dosen' => 'kode_dosen']],
            [['id_jenis_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => JenisDosen::className(), 'targetAttribute' => ['id_jenis_dosen' => 'id_jenis_dosen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jabatan' => 'Id Jabatan',
            'kode_dosen' => 'Kode Dosen',
            'id_jenis_dosen' => 'Id Jenis Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDosen()
    {
        return $this->hasOne(Dosen::className(), ['kode_dosen' => 'kode_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisDosen()
    {
        return $this->hasOne(JenisDosen::className(), ['id_jenis_dosen' => 'id_jenis_dosen']);
    }
}
