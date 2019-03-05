<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UploadproposalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uploadproposal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_upload') ?>

    <?= $form->field($model, 'id_pengajuan') ?>

    <?= $form->field($model, 'nama_file') ?>

    <?= $form->field($model, 'ukuran_fIle') ?>

    <?= $form->field($model, 'id_persyaratan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
