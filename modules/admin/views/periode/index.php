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

$this->title = 'Periode';
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
                'size' => 'modal-sm',
            ]);
            ?>
            <div id='modalContentPeriode'></div>
            <?php
            Modal::end();
            ?>
            <?= Html::button('Tambah Periode', ['value' => Url::to(['create']), 'class' => 'button button-glow button-rounded button-caution pull-right', 'id' => 'modalButtonPeriode']); ?>
            <br/>
            <?php Pjax::begin(['id' => 'periodeGrid']); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['width' => '5%', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
//                    [
//                        'attribute' => 'tgl',
//                        'headerOptions' => ['width' => '10%', 'text-align' => 'center'],
//                        'contentOptions' => ['style' => 'text-align:center'],
//                    // 'filter' => Html::dropDownList($searchModel->tgl, 'tgl', array_combine(range(1, $number), range(1, $number))),
//                    ],
                    [
                        'attribute' => 'bulan',
                        'value' => function($model) {
                            return Periode::getNamaBulan($model->bulan);
                        },
                        'headerOptions' => ['width' => '50%', 'text-align' => 'center']
                    ],
                    [
                        'attribute' => 'tahun',
                        'headerOptions' => ['width' => '10%', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                    ],
                    //'status_vakasi',
                    //'tgl_pencairan',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['width' => '30%', 'text-align' => 'center'],
                        'contentOptions' => ['style' => 'text-align:center'],
                        'buttons' => [
                            'view' => function ($url, $model) {
                                $icon = '<span class="icon-ar icon-ar-inverse icon-ar-info icon-ar-square icon-ar-sm"><i class="fa fa-globe"></i></span>';
                                return Html::a($icon, $url, [
                                            'data-toggle' => "modal",
                                            'data-target' => "#categoryModal",
                                ]);
                            },
                            'update' => function ($url, $model) {
                                $icon = '<span class="icon-ar icon-ar-inverse icon-ar-success icon-ar-square icon-ar-sm"><i class="fa fa-pencil"></i></span>';
                                return Html::a($icon, $url, [
                                            'data-toggle' => "modal",
                                            'data-target' => "#categoryModal",
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                $icon = '<span class="icon-ar icon-ar-inverse icon-ar-danger icon-ar-square icon-ar-sm"><i class="fa fa-trash"></i></span>';
                                return Html::a($icon, $url, [
                                            'data-toggle' => "modal",
                                            'data-target' => "#categoryModal",
                                ]);
                            },
                        ],
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
