<?php

use app\models\Periode;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Periode */
/* @var $form ActiveForm */
?>

<div class="periode-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>
    <?php
    $todayMonth = date("m");
    $todayYear = date("y");
    $todayYears = date("Y");
    $number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31
    ?>
   

    <?= $form->field($model, 'bulan')->dropDownList(array_combine(range(1, 12), range(1, 12)), ['prompt' => 'Pilih Bulan']) ?>

    <?= $form->field($model, 'tahun')->dropDownList(array_combine(range(2015, $todayYears), range(2015, $todayYears)), ['prompt' => 'Pilih Tahun']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
    .done(function(result){
        result = JSON.parse(result);
        if(result.status == 'Success'){
            $(\$form).trigger("reset");
            $(document).find('#modalPeriode').modal('hide');
            $.pjax.reload({container:'#periodeGrid'});
        }else{
            $(\$form).trigger("reset");
            $("#message").html(result.message);
        }
    })
    .fail(function(){
        console.log("server error");
    });

    return false;
});

JS;
$this->registerJS($script);
?>
