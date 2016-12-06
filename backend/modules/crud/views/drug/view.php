<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/d4b4964a63cc95065fa0ae19074007ee
 *
 * @package default
 */


use dmstr\helpers\Html;
use yii\grid\SerialColumn;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\Drug $model
 */
$copyParams = $model->attributes;

$this->title = $model->getAliasModel() . $model->trade_name;
$this->params['breadcrumbs'][] = ['label' => $model->getAliasModel(true), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->trade_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud drug-view">

    <!-- flash message -->
    <?php 
    
    if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
              <?php echo $model->trade_name ?>        
    </h1>


    <div class="clearfix crud-navigation">
        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?php echo Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Copy'), ['create', 'id' => $model->id, 'Drug            '=>$copyParams], ['class' => 'btn btn-success']) ?>
            <?php echo Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
			<?php
			if ($model->isSignaled($signaledDrugs,'drug_id')) {
				 echo '<span class="alert-signal-color"> <span class="glyphicon glyphicon-warning-sign "></span> '.Yii::t('app','Signal Detected Check Icsrs Below').'</span>';
			}
			?>
        </div>
        <div class="pull-right">
            <?php echo Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>


    <?php $this->beginBlock('backend\modules\crud\models\Drug'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'generic_name',
			'trade_name',
			'composition',
			'manufacturer',
			'strength',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'route_lkp_id',
				//'value' => ($model->getRouteLkp()->one() ? Html::a($model->getRouteLkp()->one()->id, ['/crud/lkp-route/view', 'id' => $model->getRouteLkp()->one()->id, ]) : '<span class="label label-warning">?</span>'),
                            'value' => ($model->getRouteLkp()->one() ?  $model->getRouteLkp()->one()->description : '<span class="label label-warning">?</span>'),
			],
		],
	]); ?>


    <hr/>


    <?php $this->endBlock(); ?>





<?php $this->beginBlock('Icsrs'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

<a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/icsr/create', 'Icsr' => ['drug_id' => $model->id]])?>">

	<span class="glyphicon glyphicon-plus"></span><?= Yii::t('app','New ').'Icsr'?>
</a>

</div></div><?php Pjax::begin(['id'=>'pjax-Icsrs', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Icsrs ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => $icsrDataProvider,
		'filterModel' => $icsrSeachModel,
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update} {signal}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr' . '/' . $action;
					return $params;
				},
				'buttons'    => [
					'signal' => function ($url,$model) use ($signaledIcsrs){

						if ($model->isSignaled($signaledIcsrs,'icsr_id'))
						{
							return '<small class="alert-signal-color"><span class="glyphicon glyphicon-warning-sign "></span> '.Yii::t('app','Signal Detected'). '</small>';

						}
						return '';

					}

				],
				'controller' => '/crud/icsr'
			],
			[
				'header' => Yii::t('app','ID'),
				'class' => SerialColumn::className()
			],
			'patient_identifier',
			'safetyReportId',
			[
			 'attribute' =>'meddraLltFromEvents',
				'format' => 'raw',
			],
			[
				'attribute' => 'created_by',
				'value' => function ($model,$key,$index){
				return $model->createdBy->username;
				}
			],
			'created_at'
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>



	<?php $this->beginBlock('Rmp'); ?>

	<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

			<a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/rmp/create', 'drug_id' => $model->id])?>">

				<span class="glyphicon glyphicon-plus"></span><?= Yii::t('app','New ').'Rmp'?>
			</a>

		</div></div><?php Pjax::begin(['id'=>'pjax-Rmps', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Rmps ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
	<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
			'layout' => '{summary}{pager}<br/>{items}{pager}',
			'dataProvider' => $rmpDataProvider,
			'filterModel' => $rmpSearchModel,
			'pager'        => [
				'class'          => yii\widgets\LinkPager::className(),
				'firstPageLabel' => Yii::t('app', 'First'),
				'lastPageLabel'  => Yii::t('app', 'Last')
			],
			'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/rmp' . '/' . $action;
					return $params;
				},

				'controller' => '/crud/rmp'
			],
				[
					'header' => Yii::t('app','ID'),
					'class' => SerialColumn::className()
				],
				'version',
				'version_description',
				[
					'label' => Yii::t('app','Download RMP'),
					'format' => 'raw',
					'value' => function ($model){
						return '<a href=/crud/rmp/download-file?path='.substr($model->rmp_file_url,strpos($model->rmp_file_url,'/files')).'>'.Yii::t('app','Download').'</a>';
					}
				],

				[
					'attribute' => 'rmp_created_by',
					'value' => function ($model){
						return ($model->getRmpUserName());
					}
				],
				'rmp_created_at',
				[
					'label' => Yii::t('app','Letter Header'),
					'format' => 'raw',
					'value' => function ($model){
						if (isset($model->ack_file_url) && !empty($model->ack_file_url))
						{
							return '<a href=/crud/rmp/download-file?path='.substr($model->rmp_file_url,strpos($model->rmp_file_url,'/files')).'>'.Yii::t('app','Download Letter').'</a>';
						}

						return '<a href=/crud/rmp/upload-letter-header?id='.$model->id.' class="btn btn-warning">'.Yii::t('app','Upload Letter Header').'</a>';
					}
				],
				[
					'attribute' => 'ack_created_by',
					'value' => function ($model){
						return isset($model->ack_created_by) ? $model->getAckUserName() : Yii::t('app','Not Set Yet');
					}
				],

				'ack_created_at'
			]
		]) . '</div>' ?>
	<?php Pjax::end() ?>

	<?php $this->endBlock() ?>






    <?php echo Tabs::widget(
	[
		'id' => 'relation-tabs',
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => '<b class=""># '.$model->trade_name. '</b>',
				'content' => $this->blocks['backend\modules\crud\models\Drug'],
				'active'  => true,
			],
			[
				'content' => $this->blocks['Icsrs'],
				'label'   => '<small>Icsrs <span class="badge badge-default">'.count($model->getIcsrs()->asArray()->all()).'</span></small>',
				'active'  => false,
			],

			[
				'content' => $this->blocks['Rmp'],
				'label'   => '<small>RMP <span class="badge badge-default">'.count($model->getRmps()->asArray()->all()).'</span></small>',
				'active'  => false,
			],

		]
	]
);
?>
</div>

<?php $this->registerCssFile('@web/crud/global/global.css');?>