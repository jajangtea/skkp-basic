<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jenis_proposal}}".
 *
 * @property int $id_jenis_proposal
 * @property string $nama_sidang
 *
 * @property Pengajuan[] $pengajuans
 */
class JenisProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis_proposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_sidang'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_proposal' => 'Id Jenis Proposal',
            'nama_sidang' => 'Nama Sidang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['id_jenis_proposal' => 'id_jenis_proposal']);
    }
}
