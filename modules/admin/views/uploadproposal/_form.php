<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadproposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uploadproposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pengajuan')->textInput() ?>

    <?= $form->field($model, 'nama_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ukuran_fIle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persyaratan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
