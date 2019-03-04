<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ta}}".
 *
 * @property int $IdTa
 * @property string $Tahun
 * @property string $Semester
 *
 * @property Sidangmaster[] $sidangmasters
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
            [['Tahun'], 'string', 'max' => 200],
            [['Semester'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdTa' => 'Id Ta',
            'Tahun' => 'Tahun',
            'Semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangmasters()
    {
        return $this->hasMany(Sidangmaster::className(), ['IdTa' => 'IdTa']);
    }
}
