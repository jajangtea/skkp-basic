<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%nilai_penguji}}".
 *
 * @property int $id_nilai_penguji
 * @property int $id_penguji_skripsi
 * @property double $nilai_skripsi
 *
 * @property PengujiSkripsi $pengujiSkripsi
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
            [['id_penguji_skripsi'], 'integer'],
            [['nilai_skripsi'], 'number'],
            [['id_penguji_skripsi'], 'exist', 'skipOnError' => true, 'targetClass' => PengujiSkripsi::className(), 'targetAttribute' => ['id_penguji_skripsi' => 'id_penguji_skripsi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai_penguji' => 'Id Nilai Penguji',
            'id_penguji_skripsi' => 'Id Penguji Skripsi',
            'nilai_skripsi' => 'Nilai Skripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujiSkripsi()
    {
        return $this->hasOne(PengujiSkripsi::className(), ['id_penguji_skripsi' => 'id_penguji_skripsi']);
    }
}
