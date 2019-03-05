<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ta */

$this->title = 'Create Ta';
$this->params['breadcrumbs'][] = ['label' => 'Tas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
