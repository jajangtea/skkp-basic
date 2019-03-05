<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bagian}}".
 *
 * @property int $id_bagian
 * @property string $nama_bagian
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
            [['id_bagian'], 'required'],
            [['id_bagian'], 'integer'],
            [['nama_bagian'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bagian' => 'Id Bagian',
            'nama_bagian' => 'Nama Bagian',
        ];
    }
}
