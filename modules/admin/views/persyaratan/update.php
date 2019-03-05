<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persyaratan */

$this->title = 'Update Persyaratan: ' . $model->id_persyaratan;
$this->params['breadcrumbs'][] = ['label' => 'Persyaratans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persyaratan, 'url' => ['view', 'id' => $model->id_persyaratan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persyaratan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
