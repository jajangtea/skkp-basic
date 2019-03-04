<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pembimbing}}".
 *
 * @property int $idPembimbing
 * @property int $idDosen
 * @property int $idPengajuan
 * @property string $status
 *
 * @property User $dosen
 * @property Pengajuan $pengajuan
 */
class Pembimbing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pembimbing}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDosen', 'idPengajuan'], 'integer'],
            [['status'], 'required'],
            [['status'], 'string', 'max' => 50],
            [['idDosen'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idDosen' => 'id']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPembimbing' => 'Id Pembimbing',
            'idDosen' => 'Id Dosen',
            'idPengajuan' => 'Id Pengajuan',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(User::className(), ['id' => 'idDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }
}
