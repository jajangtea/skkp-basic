<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis_proposal')->textInput() ?>

    <?= $form->field($model, 'nim')->textInput() ?>

    <?= $form->field($model, 'tanggal_daftar')->textInput() ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_status_proposal')->textInput() ?>

    <?= $form->field($model, 'id_periode')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
