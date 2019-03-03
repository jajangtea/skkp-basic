<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajuan */

$this->title = $model->IDPengajuan;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengajuan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDPengajuan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDPengajuan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDPengajuan',
            'IDJenisSidang',
            'NIM',
            'TanggalDaftar',
            'Judul:ntext',
            'keterangan:ntext',
            'IDstatusProposal',
            'idPeriode',
        ],
    ]) ?>

</div>
