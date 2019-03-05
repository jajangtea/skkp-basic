<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadproposal */

$this->title = 'Update Uploadproposal: ' . $model->id_upload;
$this->params['breadcrumbs'][] = ['label' => 'Uploadproposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_upload, 'url' => ['view', 'id' => $model->id_upload]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploadproposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
