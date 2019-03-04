<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bagian}}".
 *
 * @property int $idBagian
 * @property string $namaBagian
 */
class Bagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bagian}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBagian'], 'required'],
            [['idBagian'], 'integer'],
            [['namaBagian'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBagian' => 'Id Bagian',
            'namaBagian' => 'Nama Bagian',
        ];
    }
}
