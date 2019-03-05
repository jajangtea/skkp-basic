<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pembimbing}}".
 *
 * @property int $id_pembimbing
 * @property int $id_dosen
 * @property int $id_pengajuan
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
            [['id_dosen', 'id_pengajuan'], 'integer'],
            [['status'], 'required'],
            [['status'], 'string', 'max' => 50],
            [['id_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_dosen' => 'id']],
            [['id_pengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajuan::className(), 'targetAttribute' => ['id_pengajuan' => 'id_pengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembimbing' => 'Id Pembimbing',
            'id_dosen' => 'Id Dosen',
            'id_pengajuan' => 'Id Pengajuan',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(User::className(), ['id' => 'id_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(Pengajuan::className(), ['id_pengajuan' => 'id_pengajuan']);
    }
}
