<?php

use app\models\PeriodeSearch;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model PeriodeSearch */
/* @var $form ActiveForm */
?>

<div class="periode-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1,
                ],
    ]);
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Pencarian Data</div>
        <div class="panel-body">
            <?= $form->field($model, 'tgl') ?>
            <?= $form->field($model, 'bulan') ?>
            <?= $form->field($model, 'tahun') ?>
            <?php // echo $form->field($model, 'status_vakasi')  ?>
            <?php // echo $form->field($model, 'tgl_pencairan')   ?>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div> <!-- panel panel-primary -->
    <?php ActiveForm::end(); ?>
</div>
