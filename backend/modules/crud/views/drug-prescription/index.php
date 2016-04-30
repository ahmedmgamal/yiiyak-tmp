<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\modules\crud\models\search\DrugPrescription $searchModel
*/

$this->title = $searchModel->getAliasModel(true);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud drug-prescription-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?= $searchModel->getAliasModel(true) ?>        <small>
            List
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">

                                                                                                            
            <?php echo
            \yii\bootstrap\ButtonDropdown::widget(
            [
            'id' => 'giiant-relations',
            'encodeLabel' => false,
            'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . Yii::t('app', 'Relations'),
            'dropdown' => [
            'options' => [
            'class' => 'dropdown-menu-right'
            ],
            'encodeLabels' => false,
            'items' => [            [
					'url' => ['/crud/drug/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . Yii::t('app', 'Drug') . '</i>',
            ],            [
					'url' => ['/crud/icsr/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . Yii::t('app', 'Icsr') . '</i>',
            ],            [
					'url' => ['/crud/lkp-frequency/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . Yii::t('app', 'Lkp Frequency') . '</i>',
            ],]
            ],
            'options' => [
            'class' => 'btn-default'
            ]
            ]
            );
            ?>        </div>
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
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'drug_id',
    'value' => function ($model) {
        if ($rel = $model->getDrug()->one()) {
						return Html::a($rel->id, ['/crud/drug/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'icsr_id',
    'value' => function ($model) {
        if ($rel = $model->getIcsr()->one()) {
						return Html::a($rel->id, ['/crud/icsr/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
			// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'frequency_lkp_id',
    'value' => function ($model) {
        if ($rel = $model->getFrequencyLkp()->one()) {
						return Html::a($rel->id, ['/crud/lkp-frequency/view', 'id' => $rel->id, ], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
			'expiration_date',
			'use_date_start',
			'use_date_end',
			'duration_of_use',
			/*[
                'attribute'=>'duration_of_use_unit',
                'value' => function ($model) {
                    return backend\modules\crud\models\DrugPrescription::getDurationOfUseUnitValueLabel($model->duration_of_use_unit);
                }    
            ]*/
			/*[
                'attribute'=>'problem_went_after_stop',
                'value' => function ($model) {
                    return backend\modules\crud\models\DrugPrescription::getProblemWentAfterStopValueLabel($model->problem_went_after_stop);
                }    
            ]*/
			/*[
                'attribute'=>'problem_returned_after_reuse',
                'value' => function ($model) {
                    return backend\modules\crud\models\DrugPrescription::getProblemReturnedAfterReuseValueLabel($model->problem_returned_after_reuse);
                }    
            ]*/
			/*[
                'attribute'=>'product_avilable',
                'value' => function ($model) {
                    return backend\modules\crud\models\DrugPrescription::getProductAvilableValueLabel($model->product_avilable);
                }    
            ]*/
			/*[
                'attribute'=>'drug_role',
                'value' => function ($model) {
                    return backend\modules\crud\models\DrugPrescription::getDrugRoleValueLabel($model->drug_role);
                }    
            ]*/
			/*'drug_action_drug_withdrawn:boolean'*/
			/*'drug_action_dose_reduced:boolean'*/
			/*'drug_action_dose_increased:boolean'*/
			/*'drug_action_dose_not_changed:boolean'*/
			/*'drug_action_unknown:boolean'*/
			/*'dose'*/
			/*'lot_no'*/
			/*'reason_of_use'*/
			/*'active_substance_names'*/
			/*'drug_addtional_info'*/
        ],
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>



