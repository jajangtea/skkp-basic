<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Statusproposal */

$this->title = 'Update Statusproposal: ' . $model->id_status_proposal;
$this->params['breadcrumbs'][] = ['label' => 'Statusproposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status_proposal, 'url' => ['view', 'id' => $model->id_status_proposal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statusproposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
