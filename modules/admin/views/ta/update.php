<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ta */

$this->title = 'Update Ta: ' . $model->id_ta;
$this->params['breadcrumbs'][] = ['label' => 'Tas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ta, 'url' => ['view', 'id' => $model->id_ta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
