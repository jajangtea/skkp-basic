<?php

use app\models\Periode;
use app\models\PeriodeSearch;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel PeriodeSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Periodes';
$this->params['breadcrumbs'][] = $this->title;



//$todayMonth = date("m");
//$todayYear = date("y");
//$number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31
//for ($i = 1; $i < $number; $i++) {
//    echo $i;
//}
//print_r(Periode::getNumOfMonth());
?>
<div class="periode-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">                    
        <div class="panel-heading">
            <span>Data Periode</span>
        </div>
        <div class="panel-body">
            <?php
            Modal::begin([
                'header' => '<h4 class="modal-title" id="myModalLabel">Tambah Periode</h4>',
                'id' => 'modalPeriode',
                'size' => 'modal-md',
            ]);
            ?>
            <div id='modalContentPeriode'></div>
            <?php
            Modal::end();
            ?>
            <?= Html::button('Tambah Periode', ['value' => Url::to(['create']), 'class' => 'button button-glow button-rounded button-caution pull-right', 'id' => 'modalButtonPeriode']); ?>
            <br/>
            <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                        [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['width' => '30px', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
                        [
                        'attribute' => 'tgl',
                        'headerOptions' => ['width' => '10px', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    // 'filter' => Html::dropDownList($searchModel->tgl, 'tgl', array_combine(range(1, $number), range(1, $number))),
                    ],
                        [
                        'attribute' => 'bulan',
                        'value' => function($model) {
                            return Periode::getNamaBulan($model->bulan);
                        },
                        'headerOptions' => ['width' => '70%', 'text-align' => 'center']
                    ],
                        [
                        'attribute' => 'tahun',
                        'headerOptions' => ['width' => '30px', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
                    //'status_vakasi',
                    //'tgl_pencairan',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['width' => '100px', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
