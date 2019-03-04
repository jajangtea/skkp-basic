<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%statusproposal}}".
 *
 * @property int $idstatusProp
 * @property string $nstatusProposal
 *
 * @property Pengajuan[] $pengajuans
 */
class Statusproposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%statusproposal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nstatusProposal'], 'required'],
            [['nstatusProposal'], 'string', 'max' => 259],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstatusProp' => 'Idstatus Prop',
            'nstatusProposal' => 'Nstatus Proposal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['IDstatusProposal' => 'idstatusProp']);
    }
}
