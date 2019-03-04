<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilai_penguji}}".
 *
 * @property int $idNilaiPenguji
 * @property int $idPengujiSkripsi
 * @property double $nilaiSkripsi
 *
 * @property Pengujiskripsi $pengujiSkripsi
 */
class NilaiPenguji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%nilai_penguji}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPengujiSkripsi'], 'integer'],
            [['nilaiSkripsi'], 'number'],
            [['idPengujiSkripsi'], 'exist', 'skipOnError' => true, 'targetClass' => Pengujiskripsi::className(), 'targetAttribute' => ['idPengujiSkripsi' => 'idPengujiSkripsi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idNilaiPenguji' => 'Id Nilai Penguji',
            'idPengujiSkripsi' => 'Id Penguji Skripsi',
            'nilaiSkripsi' => 'Nilai Skripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiSkripsi()
    {
        return $this->hasOne(Pengujiskripsi::className(), ['idPengujiSkripsi' => 'idPengujiSkripsi']);
    }
}
