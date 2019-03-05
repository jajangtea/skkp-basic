<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadproposal */

$this->title = 'Create Uploadproposal';
$this->params['breadcrumbs'][] = ['label' => 'Uploadproposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploadproposal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
