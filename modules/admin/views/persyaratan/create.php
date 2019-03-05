<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persyaratan */

$this->title = 'Create Persyaratan';
$this->params['breadcrumbs'][] = ['label' => 'Persyaratans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persyaratan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
