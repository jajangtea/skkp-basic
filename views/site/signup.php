<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary animated fadeInDown">
                <div class="panel-heading">Lengkapi data berikut :</div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <form role="form">
                        <div class="form-group">

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('NIM') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($modelMhs, 'Nama')->label('Nama Lengkap') ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $form->field($modelMhs, 'KodeJurusan')->widget(Select2::classname(), [
                                'data' => $authItems,
                                'options' => [
                                    'placeholder' => 'Pilih Prodi',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ])->label('Prodi');
                            ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'email') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($modelMhs, 'Tlp')->label('Telepon') ?>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label for="inlineCheckbox1">I read <a href="#">Terms and Conditions</a>.</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary pull-right', 'name' => 'signup-button']) ?>
                            </div>
                        </div>
                    </form>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container  -->
