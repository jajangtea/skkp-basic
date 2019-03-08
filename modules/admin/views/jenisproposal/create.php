<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisProposal */

$this->title = 'Create Jenis Proposal';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-proposal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
