<?php

use app\models\Periode;
use app\models\PeriodeSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel PeriodeSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Periodes';
$this->params['breadcrumbs'][] = $this->title;

$todayMonth = date("m");
$todayYear = date("y");
$number = cal_days_in_month(CAL_GREGORIAN, $todayMonth, $todayYear); // 31

for ($i = 1; $i < $number; $i++) {
    $no[] = array($i) . ',';
}
?>
<div class="periode-index">
    <?php Pjax::begin(); ?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">                    
        <div class="panel-heading">
            <span>Data Periode</span>
        </div>
        <div class="panel-body">
            <?= Html::a('Tambah Periode', ['create'], ['class' => 'button button-glow button-rounded button-highlight pull-right']) ?>
            <br/>
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
                        //'filter' => Html::dropDownList('SearchUser[status]', '', array('' => 'Select Status') + common\models\User::getStatus(), ['prompt' => '-- LIST ALL --', 'class' => 'form-control']),
                        'filter' => Html::dropDownList($model, 'tgl', Periode::getNumOfMonth()
                        )

                    //'filter' => Html::activeDropDownList($model, 'tgl',  ArrayHelper::map('',Periode::getNumOfMonth(),Periode::getNumOfMonth()), ['class' => 'form-control', 'prompt' => 'Select Category']),
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
