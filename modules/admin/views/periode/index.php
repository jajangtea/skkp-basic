<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periode-index">

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Periode', ['create'], ['class' => 'btn btn-success']) ?>
         <?= Html::a('Tambah Periode', ['create'], ['class' => 'button button-glow button-rounded button-highlight pull-right']) ?>
    </p>
    <hr/>

    <div class="panel panel-primary">                    
        <div class="panel-heading">
            <span>Data Periode</span>
           

        </div>

        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox1">
                    <label for="checkbox1">
                        Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-ar btn-primary">Submit</button>
            </form>
        </div>

    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'tgl',
            'bulan',
            'tahun',
            //'status_vakasi',
            //'tgl_pencairan',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
