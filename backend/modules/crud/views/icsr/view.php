<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/d4b4964a63cc95065fa0ae19074007ee
 *
 * @package default
 */


use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\Icsr $model
 */
$copyParams = $model->attributes;

$this->title = $model->getAliasModel() . $model->id;
 
 $this->params['breadcrumbs'][] = ['label' => $model->getDrug()->one()->trade_name, 'url' => ['/crud/drug/view', 'id'=>$model->getDrug()->one()->id]];
 
$this->params['breadcrumbs'][] = ['label' => $model->getAliasModel(true), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud icsr-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo $model->getAliasModel() ?>        <small>
            <?php echo $model->id ?>        </small>
    </h1>


    <div class="clearfix crud-navigation">
        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?php echo Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Export  Xml'), ['export', 'id' => $model->id ], ['class' => 'btn btn-success', 'target'=>'_blank']) ?>
        </div>


    </div>


    <?php $this->beginBlock('backend\modules\crud\models\Icsr'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'drug_id',
				'value' => ($model->getDrug()->one() ? Html::a($model->getDrug()->one()->id, ['/crud/drug/view', 'id' => $model->getDrug()->one()->id, ]) : '<span class="label label-warning">?</span>'),
			],
			'patient_identifier',
			'patient_age',
			[
				'attribute'=>'patient_age_unit',
				'value'=>backend\modules\crud\models\Icsr::getPatientAgeUnitValueLabel($model->patient_age_unit),
			],
			'patient_birth_date',
			'patient_weight',
			[
				'attribute'=>'patient_weight_unit',
				'value'=>backend\modules\crud\models\Icsr::getPatientWeightUnitValueLabel($model->patient_weight_unit),
			],
			'extra_history',
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id],
	[
		'class' => 'btn btn-danger',
		'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
		'data-method' => 'post',
	]); ?>
    <?php $this->endBlock(); ?>



<?php $this->beginBlock('DrugPrescriptions'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Drug Prescription',
	['/crud/drug-prescription/create', 'DrugPrescription' => ['icsr_id' => $model->id]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-DrugPrescriptions', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-DrugPrescriptions ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getDrugPrescriptions(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-drugprescriptions']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/drug-prescription' . '/' . $action;
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/drug-prescription'
			],
			'id',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'drug_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getDrug()->one()) {
						return Html::a($rel->trade_name, ['/crud/drug/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'dose',

			'expiration_date',
			'lot_no',
			'ndc',
			'use_date_start',
			'use_date_end',
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrConcomitantDrugs'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Concomitant Drug',
	['/crud/icsr-concomitant-drug/create', 'IcsrConcomitantDrug' => ['icsr_id' => $model->id]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrConcomitantDrugs', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrConcomitantDrugs ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrConcomitantDrugs(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsrconcomitantdrugs']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-concomitant-drug' . '/' . $action;
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/icsr-concomitant-drug'
			],
			'id',
			'drug_name',
			'start_date',
			'stop_date',
			'duration_of_use',
			'dose',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'frequency_lkp_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getFrequencyLkp()->one()) {
						return Html::a($rel->description, ['/crud/lkp-frequency/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrEvents'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Event',
	['/crud/icsr-event/create', 'IcsrEvent' => ['icsr_id' => $model->id]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrEvents', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrEvents ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrEvents(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsrevents']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-event' . '/' . $action;
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/icsr-event'
			],
			'id',
			'event_description',
			'event_type',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'meddra_llt_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getMeddraLlt()->one()) {
						return Html::a($rel->code, ['/crud/lkp-meddra-llt/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'meddra_pt_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getMeddraPt()->one()) {
						return Html::a($rel->code, ['/crud/lkp-meddra-pt/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'event_date',
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrOutcomeLkps'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
 

  <?php echo Html::a(
	'<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Icsr Outcome Lkp', ['/crud/icsr-outcome/create', 'IcsrOutcome'=>['icsr_id'=>$model->id]],
	['class'=>'btn btn-info btn-xs']
) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrOutcomeLkps', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrOutcomeLkps ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrOutcomes(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsroutcomes']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {delete}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-outcome' . '/' . $action;
					return $params;
				},
				'buttons'    => [

					/**
					 *
					 */
					'delete' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
								'class' => 'text-danger',
								'title'         => Yii::t('app', 'Remove'),
								'data-confirm'  => Yii::t('app', 'Are you sure you want to delete the related item?'),
								'data-method' => 'post',
								'data-pjax' => '0',
							]);
					},

					/**
					 *
					 */
					'view' => function ($url, $model) {
						return Html::a(
							'<span class="glyphicon glyphicon-cog"></span>',
							$url,
							[
								'data-title'  => Yii::t('app', 'View Pivot Record'),
								'data-toggle' => 'tooltip',
								'data-pjax'   => '0',
								'class'       => 'text-muted',
							]
						);
					},
				],
				'controller' => '/crud/icsr-outcome'
			],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'icsr_outcome_lkp_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getIcsrOutcomeLkp()->one()) {
						return Html::a($rel->description, ['/crud/lkp-icsr-outcome/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'icsr_outcome_date',
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrReporters'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
 
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Reporter',
	['/crud/icsr-reporter/create', 'IcsrReporter' => ['icsr_id' => $model->id]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrReporters', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrReporters ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrReporters(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsrreporters']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-reporter' . '/' . $action;
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/icsr-reporter'
			],
			'id',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'country_lkp_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getCountryLkp()->one()) {
						return Html::a($rel->name, ['/crud/lkp-country/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'first_name',
			'last_name',
			'address_line_1',
			'address_line_2',
			'city',
			'state',
			'zip_code',
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrTests'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
 
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Test',
	['/crud/icsr-test/create', 'IcsrTest' => ['icsr_id' => $model->id]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrTests', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrTests ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrTests(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsrtests']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-test' . '/' . $action;
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/icsr-test'
			],
			'id',
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'test_lkp_id',

				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getTestLkp()->one()) {
						return Html::a($rel->name, ['/crud/lkp-test/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'date',
			'result',
			'result_unit',
			'normal_low_range',
			'normal_high_range',
			'more_info',
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('IcsrTypeLkps'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
 

  <?php echo Html::a(
	'<span class="glyphicon glyphicon-link"></span> ' . Yii::t('app', 'Attach') . ' Icsr Type Lkp', ['/crud/icsr-type/create', 'IcsrType'=>['icsr_id'=>$model->id]],
	['class'=>'btn btn-info btn-xs']
) ?>
</div></div><?php Pjax::begin(['id'=>'pjax-IcsrTypeLkps', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-IcsrTypeLkps ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?php echo '<div class="table-responsive">' . \yii\grid\GridView::widget([
		'layout' => '{summary}{pager}<br/>{items}{pager}',
		'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrTypes(), 'pagination' => ['pageSize' => 20, 'pageParam'=>'page-icsrtypes']]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('app', 'First'),
			'lastPageLabel'  => Yii::t('app', 'Last')
		],
		'columns' => [[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {delete}',
				'contentOptions' => ['nowrap'=>'nowrap'],

				/**
				 *
				 */
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/icsr-type' . '/' . $action;
					return $params;
				},
				'buttons'    => [

					/**
					 *
					 */
					'delete' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
								'class' => 'text-danger',
								'title'         => Yii::t('app', 'Remove'),
								'data-confirm'  => Yii::t('app', 'Are you sure you want to delete the related item?'),
								'data-method' => 'post',
								'data-pjax' => '0',
							]);
					},

					/**
					 *
					 */
					'view' => function ($url, $model) {
						return Html::a(
							'<span class="glyphicon glyphicon-cog"></span>',
							$url,
							[
								'data-title'  => Yii::t('app', 'View Pivot Record'),
								'data-toggle' => 'tooltip',
								'data-pjax'   => '0',
								'class'       => 'text-muted',
							]
						);
					},
				],
				'controller' => '/crud/icsr-type'
			],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'icsr_type_lkp_id',
                                'label' => 'Icsr Type',
				/**
				 *
				 */
				'value' => function ($model) {
					if ($rel = $model->getIcsrTypeLkp()->one()) {
						return Html::a($rel->description, ['/crud/lkp-icsr-type/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
		]
	]) . '</div>' ?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?php echo Tabs::widget(
	[
		'id' => 'relation-tabs',
		'encodeLabels' => false,
		'items' => [ [
				'label'   => '<b class=""># '.$model->id.'</b>',
				'content' => $this->blocks['backend\modules\crud\models\Icsr'],
				'active'  => true,
			], [
				'content' => $this->blocks['DrugPrescriptions'],
				'label'   => '<small>Drug Prescriptions <span class="badge badge-default">'.count($model->getDrugPrescriptions()->asArray()->all()).'</span></small>',
				'active'  => false,
			], [
				'content' => $this->blocks['IcsrOutcomeLkps'],
				'label'   => '<small>Icsr Outcome  <span class="badge badge-default">'.count($model->getIcsrOutcomeLkps()->asArray()->all()).'</span></small>',
				'active'  => false,
			], [
				'content' => $this->blocks['IcsrTypeLkps'],
				'label'   => '<small>Icsr Type  <span class="badge badge-default">'.count($model->getIcsrTypeLkps()->asArray()->all()).'</span></small>',
				'active'  => false,
			],[
				'content' => $this->blocks['IcsrEvents'],
				'label'   => '<small>Icsr Events <span class="badge badge-default">'.count($model->getIcsrEvents()->asArray()->all()).'</span></small>',
				'active'  => false,
			],[
				'content' => $this->blocks['IcsrTests'],
				'label'   => '<small>Icsr Tests <span class="badge badge-default">'.count($model->getIcsrTests()->asArray()->all()).'</span></small>',
				'active'  => false,
			], [
				'content' => $this->blocks['IcsrReporters'],
				'label'   => '<small>Icsr Reporters <span class="badge badge-default">'.count($model->getIcsrReporters()->asArray()->all()).'</span></small>',
				'active'  => false,
			], [
				'content' => $this->blocks['IcsrConcomitantDrugs'],
				'label'   => '<small>Icsr Concomitant Drugs <span class="badge badge-default">'.count($model->getIcsrConcomitantDrugs()->asArray()->all()).'</span></small>',
				'active'  => false,
			], ]
	]
);
?>
</div>
