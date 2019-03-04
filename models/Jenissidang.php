<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenissidang}}".
 *
 * @property int $IDJenisSidang
 * @property string $NamaSidang
 * @property double $NominalVakasi
 *
 * @property Pengajuan[] $pengajuans
 * @property PersyaratanJenis[] $persyaratanJenis
 * @property Sidangmaster[] $sidangmasters
 */
class Jenissidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenissidang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDJenisSidang', 'NominalVakasi'], 'required'],
            [['IDJenisSidang'], 'integer'],
            [['NominalVakasi'], 'number'],
            [['NamaSidang'], 'string', 'max' => 50],
            [['IDJenisSidang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDJenisSidang' => 'Id Jenis Sidang',
            'NamaSidang' => 'Nama Sidang',
            'NominalVakasi' => 'Nominal Vakasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersyaratanJenis()
    {
        return $this->hasMany(PersyaratanJenis::className(), ['idJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidangmasters()
    {
        return $this->hasMany(Sidangmaster::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }
}
