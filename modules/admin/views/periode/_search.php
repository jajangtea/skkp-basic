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
            <div class="row">
                <?php
                $todayMonth = date("m");
                $todayYear = date("y");
                $todayYears = date("Y");
                $number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31
                ?>
                <div class="col-lg-6">  <?= $form->field($model, 'bulan')->dropDownList(array_combine(range(1, 12), range(1, 12)), ['prompt' => 'Pilih Bulan']) ?></div>
                <div class="col-lg-6"> <?= $form->field($model, 'tahun')->dropDownList(array_combine(range(2015, $todayYears), range(2015, $todayYears)), ['prompt' => 'Pilih Tahun']) ?></div>
            </div>
            <div class="row">
                <div class="col-lg-12">    
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?></div>
            </div>
        </div>
    </div>
</div> <!-- panel panel-primary -->
<?php ActiveForm::end(); ?>
</div>
