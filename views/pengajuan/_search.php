<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengajuanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'IDPengajuan') ?>

    <?= $form->field($model, 'IDJenisSidang') ?>

    <?= $form->field($model, 'NIM') ?>

    <?= $form->field($model, 'TanggalDaftar') ?>

    <?= $form->field($model, 'Judul') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'IDstatusProposal') ?>

    <?php // echo $form->field($model, 'idPeriode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
