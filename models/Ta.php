<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ta}}".
 *
 * @property int $id_ta
 * @property string $tahun
 * @property string $semester
 *
 * @property SidangMaster[] $sidangMasters
 */
class Ta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ta}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'string', 'max' => 200],
            [['semester'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ta' => 'Id Ta',
            'tahun' => 'Tahun',
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangMasters()
    {
        return $this->hasMany(SidangMaster::className(), ['id_ta' => 'id_ta']);
    }
}
