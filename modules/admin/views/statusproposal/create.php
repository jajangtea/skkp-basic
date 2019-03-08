<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Statusproposal */

$this->title = 'Create Statusproposal';
$this->params['breadcrumbs'][] = ['label' => 'Statusproposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statusproposal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
