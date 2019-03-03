<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="input-group login-input">
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'size' => 60])->label("Username") ?>
</div>
<br>
<div class="input-group login-input">
    <?= $form->field($model, 'password')->passwordInput(['size' => 60])->label("Password") ?>
</div>
<div class="input-group login-input">
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
</div>
<?= Html::submitButton('Login', ['class' => 'btn btn-ar btn-primary pull-right', 'name' => 'login-button']) ?>
<a href="#" class="social-icon-ar sm twitter animated fadeInDown animation-delay-2"><i class="fa fa-twitter"></i></a>
<a href="#" class="social-icon-ar sm google-plus animated fadeInDown animation-delay-3"><i class="fa fa-google-plus"></i></a>
<a href="#" class="social-icon-ar sm facebook animated fadeInDown animation-delay-4"><i class="fa fa-facebook"></i></a>
<hr class="dotted margin-10">
<a href="#" class="btn btn-ar btn-success pull-right">Create Account</a>
<a href="#" class="btn btn-ar btn-warning">Password Recovery</a>
<div class="clearfix"></div>

<?php ActiveForm::end(); ?>