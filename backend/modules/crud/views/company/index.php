<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/a0a12d1bd32eaeeb8b2cff56d511aa22
 *
 * @package default
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\crud\models\search\Company $searchModel
 */
$this->title = $searchModel->getAliasModel(true);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud company-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
?>


    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?php echo $searchModel->getAliasModel(true) ?>        <small>
            List
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php echo Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">

       </div>
    </div>


    <div class="table-responsive">
        <?php echo GridView::widget([
		'layout' => '{summary}{pager}{items}{pager}',
		'dataProvider' => $dataProvider,
		'pager' => [
			'class' => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel' => Yii::t('app', 'Last')        ],

		'filterModel' => $searchModel,
		'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
		'headerRowOptions' => ['class'=>'x'],
		'columns' => [

			[
				'class' => 'yii\grid\ActionColumn',
				'urlCreator' => function($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
					return Url::toRoute($params);
				},
				'contentOptions' => ['nowrap'=>'nowrap'],
				'visibleButtons' => [ 'delete' => false]

			],
			[
				'attribute' => 'id',
				'value' => function ($model){

					$misleadingString = hexdec($model->id / .2 . "PVRadar");

					return "PV-Company-{$misleadingString}" ;
				}
			],
			'name',
			'adderess',
			'license_no',
			'license_image_url:url',
			'end_date',
			[
				'attribute' => 'plan_id',
				'value' => function ($model,$index,$dataColumn){
					return $model->plan->name;
				}
			],
			[
				'label' => Yii::t('app','Statistics'),
				'format' => 'raw',
				'value' => function ($model,$index,$datColumn)
				{
					return  '<a href="'.Url::to(['company/company-statistics','companyId' => $model->id]).'" title="Statistics" aria-label="Statistics" data-pjax="0" class="btn btn-default statisticsColor"><span class="glyphicon glyphicon-stats"></span></a>';
				}
			]
		],
	]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>
<?php $this->registerCssFile('@web/crud/company/css/custom.css',['depends' => [\yii\bootstrap\BootstrapAsset::className()]])?>
