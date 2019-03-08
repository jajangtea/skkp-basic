<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisProposal */

$this->title = 'Update Jenis Proposal: ' . $model->id_jenis_sidang;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_sidang, 'url' => ['view', 'id' => $model->id_jenis_sidang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-proposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
