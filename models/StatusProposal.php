<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%status_proposal}}".
 *
 * @property int $id_status_proposal
 * @property string $n_status_proposal
 *
 * @property Pengajuan[] $pengajuans
 */
class StatusProposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%status_proposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['n_status_proposal'], 'required'],
            [['n_status_proposal'], 'string', 'max' => 259],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_status_proposal' => 'Id Status Proposal',
            'n_status_proposal' => 'N Status Proposal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['id_status_proposal' => 'id_status_proposal']);
    }
}
