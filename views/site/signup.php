<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'email') ?>


                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Email<sup>*</sup></label>
                            <input type="email" class="form-control" id="InputEmail">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="InputPassword">Password<sup>*</sup></label>
                                    <input type="password" class="form-control" id="InputPassword">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="InputConfirmPassword">Confirm Password<sup>*</sup></label>
                                    <input type="password" class="form-control" id="InputConfirmPassword">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label for="inlineCheckbox1">I read <a href="#">Terms and Conditions</a>.</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>
                        </div>
                    </form>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container  -->
