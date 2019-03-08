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

    <?= $form->field($model, 'id_pengajuan') ?>

    <?= $form->field($model, 'id_jenis_proposal') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'tanggal_daftar') ?>

    <?= $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'id_status_proposal') ?>

    <?php // echo $form->field($model, 'id_periode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
