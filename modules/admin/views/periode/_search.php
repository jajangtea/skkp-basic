<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periode-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
    ]);
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Pencarian Data</div>
        <div class="panel-body">
            <?= $form->field($model, 'tgl') ?>
            <?= $form->field($model, 'bulan') ?>
            <?= $form->field($model, 'tahun') ?>
            <?php // echo $form->field($model, 'status_vakasi') ?>
            <?php // echo $form->field($model, 'tgl_pencairan')  ?>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div> <!-- panel panel-primary -->
    <?php ActiveForm::end(); ?>
</div>
