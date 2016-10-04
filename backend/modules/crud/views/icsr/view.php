<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var backend\modules\crud\models\Icsr $model
 */
$copyParams = $model->attributes;

$this->title = $model->getAliasModel() . $model->patient_identifier;
$this->params['breadcrumbs'][] = ['label' => $model->getDrug()->one()->trade_name, 'url' => ['/crud/drug/view', 'id' => $model->getDrug()->one()->id]];
$this->params['breadcrumbs'][] = ['label' => $model->getAliasModel(true), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->patient_identifier, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
$icsrIsExported = $model->isIcsrExported($model->id);
$updateTemplate = '';
if (!$icsrIsExported)
{
    $updateTemplate = '{update}';
}
?>
<div class="giiant-crud icsr-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= $model->getAliasModel() ?>        <small>
                 </small>
    </h1>


    <div class="clearfix crud-navigation">
        <!-- menu buttons -->
        <div class='pull-left'>
            <?php if (!$icsrIsExported) {?>
            <?php echo Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                <?php echo Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Export  Xml'), ['export', 'id' => $model->id  ,'case' => 'normal'], ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Export  Null Case'), ['export-null-case', 'id' => $model->id ], ['class' => 'btn btn-default']) ?>        <?php } ?>
        </div>


    </div>


    <?php $this->beginBlock('backend\modules\crud\models\Icsr'); ?>


    <?php    echo DetailView::widget([
        'model' => $model,
        'attributes' => [

// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'drug_id',
                'value' => ($model->getDrug()->one() ? $model->getDrug()->one()->trade_name : '<span class="label label-warning">?</span>'),
            ],
            // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'report_type',
                'value' => ($model->getIcsrType()->one() ? $model->getIcsrType()->one()->description : '<span class="label label-warning">?</span>'),
            ],
            'patient_identifier',
            'patient_age',
            [
                'attribute' => 'patient_age_unit',
                'value' => ($model->getAgeUnit()->one() ?$model->getAgeUnit()->one()->name:'<span class="label label-warning">?</span>'),
            ],
            'patient_birth_date',
            'patient_weight',
            [
                'attribute' => 'patient_weight_unit',

                'value' => ($model->getPatientWeightUnit()->one() ?$model->getPatientWeightUnit()->one()->name:'<span class="label label-warning">?</span>'),

            ],
            'extra_history',
            'is_serious:boolean',
            'results_in_death:boolean',
            'life_threatening:boolean',
            'requires_hospitalization:boolean',
            'results_in_disability:boolean',
            'is_congenital_anomaly:boolean',
            'others_significant:boolean',

// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'reaction_country_id',
                'value' => ($model->getReactionCountry()->one() ? $model->getReactionCountry()->one()->name : '<span class="label label-warning">?</span>'),
            ],

        ],
    ]);
    ?>


    <hr/>


    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('DrugPrescriptions'); ?>

    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
            <?php if (!$icsrIsExported){?>
            <a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/drug-prescription/create',  'DrugPrescription' => ['icsr_id' => $model->id]])?>">

                <span class="glyphicon glyphicon-plus"></span>

              <?=  Yii::t('app','New ').' Drug Prescription';
                }?>
            </a>



        </div></div><?php Pjax::begin(['id' => 'pjax-DrugPrescriptions', 'enableReplaceState' => false, 'linkSelector' => '#pjax-DrugPrescriptions ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <?=
    '<div class="table-responsive">' . \yii\grid\GridView::widget([
        'layout' => '{summary}{pager}<br/>{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getDrugPrescriptions(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-drugprescriptions']]),
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => Yii::t('app', 'First'),
            'lastPageLabel' => Yii::t('app', 'Last')
        ],
        'columns' => [[
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view}  '.$updateTemplate,
        'contentOptions' => ['nowrap' => 'nowrap'],
        /**
         *
         */
        'urlCreator' => function ($action, $model, $key, $index) {
    // using the column name as key, not mapping to 'id' like the standard generator
    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
    $params[0] = '/crud/drug-prescription' . '/' . $action;
    return $params;
},
        'buttons' => [
        ],
        'controller' => '/crud/drug-prescription'
            ],
            [
              'attribute' => 'id',
                'value' => function ($model,$key,$index){

                    return ++$index;
                }
            ],
   
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'drug_role',
                'value' => function ($model) {
                     return $model->getDrugRole()->one()->name;
                    
                },
                        'format' => 'raw',
            ],// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'drug_id',
                'value' => function ($model) {
                    if ($rel = $model->getDrug()->one()) {
                        return  $rel->trade_name;
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
                'active_substance_names'
,                        
                        
                        
                        


                        ]
                    ]) . '</div>'
                    ?>
                    <?php Pjax::end() ?>
                    <?php $this->endBlock() ?>


                    <?php $this->beginBlock('IcsrEvents'); ?>
                    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

                            <?php if (!$icsrIsExported){?>
                            <a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/icsr-event/create', 'IcsrEvent' => ['icsr_id' => $model->id]])?>">

                                <span class="glyphicon glyphicon-plus"></span><?= Yii::t('app','New ').' Icsr Event'?>
                            </a>
                            <?php }?>

                        </div></div><?php Pjax::begin(['id' => 'pjax-IcsrEvents', 'enableReplaceState' => false, 'linkSelector' => '#pjax-IcsrEvents ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
                    <?=
                    '<div class="table-responsive">' . \yii\grid\GridView::widget([
                        'layout' => '{summary}{pager}<br/>{items}{pager}',
                        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrEvents(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-icsrevents']]),
                        'pager' => [
                            'class' => yii\widgets\LinkPager::className(),
                            'firstPageLabel' => Yii::t('app', 'First'),
                            'lastPageLabel' => Yii::t('app', 'Last')
                        ],
                        'columns' => [[
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} '.$updateTemplate,
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                    $params[0] = 'icsr-event' . '/' . $action;
                    return $params;
                },
                        'buttons' => [
                        ],
                        'controller' => 'icsr-event'
                            ],
                            [
                                'attribute' => 'id',
                                'value' => function ($model,$key,$index){

                                    return ++$index;
                                }
                            ],
                            'event_description',
                            [
                                'attribute' =>   'lkp_icsr_eventoutcome_id',
                                'value' => function($model){
                                               return $model->getLkpIcsrEventoutcome()->one()->name;
                                }
                            ],
                                'meddra_llt_text',
                                    'meddra_pt_text',
                                            'event_date',
                                        ]
                                    ]) . '</div>'
                                    ?>
                                    <?php Pjax::end() ?>
                                <?php $this->endBlock() ?>



                                            <?php $this->beginBlock('IcsrReporters'); ?>
                                    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

                                            <?php if (!$icsrIsExported){?>
                                            <a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/icsr-reporter/create', 'IcsrReporter' => ['icsr_id' => $model->id]])?>">

                                                <span class="glyphicon glyphicon-plus"></span><?= Yii::t('app','New ').' Icsr Reporter'?>
                                            </a>
                                            <?php }?>



                                        </div></div><?php Pjax::begin(['id' => 'pjax-IcsrReporters', 'enableReplaceState' => false, 'linkSelector' => '#pjax-IcsrReporters ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
                                    <?=
                                    '<div class="table-responsive">' . \yii\grid\GridView::widget([
                                        'layout' => '{summary}{pager}<br/>{items}{pager}',
                                        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrReporters(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-icsrreporters']]),
                                        'pager' => [
                                            'class' => yii\widgets\LinkPager::className(),
                                            'firstPageLabel' => Yii::t('app', 'First'),
                                            'lastPageLabel' => Yii::t('app', 'Last')
                                        ],
                                        'columns' => [[
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{view} '.$updateTemplate,
                                        'contentOptions' => ['nowrap' => 'nowrap'],
                                        'urlCreator' => function ($action, $model, $key, $index) {
                                    // using the column name as key, not mapping to 'id' like the standard generator
                                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                                    $params[0] = 'icsr-reporter' . '/' . $action;
                                    return $params;
                                },
                                        'buttons' => [
                                        ],
                                        'controller' => 'icsr-reporter'
                                            ],
                                           [
                                               'attribute' => 'id',
                                               'value' => function ($model,$key,$index){

                                                return ++$index;
                                               }
                                           ],
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                                            [
                                                'class' => yii\grid\DataColumn::className(),
                                                'attribute' => 'country_lkp_id',
                                                'value' => function ($model) {
                                                    if ($rel = $model->getCountryLkp()->one()) {
                                                        return  $rel->name;
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
                                            ]) . '</div>'
                                            ?>
                                        <?php Pjax::end() ?>
                                            <?php $this->endBlock() ?>


                                                    <?php $this->beginBlock('IcsrTests'); ?>

                                            <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

                                                    <?php if (!$icsrIsExported){?>
                                                    <a class="btn btn-success btn-xs" href="<?= Url::to(['/crud/icsr-test/create', 'IcsrTest' => ['icsr_id' => $model->id]])?>">

                                                        <span class="glyphicon glyphicon-plus"></span><?= Yii::t('app','New ').' Icsr Test'?>
                                                    </a>
                                                    <?php } ?>

                                                </div></div><?php Pjax::begin(['id' => 'pjax-IcsrTests', 'enableReplaceState' => false, 'linkSelector' => '#pjax-IcsrTests ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
                                            <?=
                                            '<div class="table-responsive">' . \yii\grid\GridView::widget([
                                                'layout' => '{summary}{pager}<br/>{items}{pager}',
                                                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrTests(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-icsrtests']]),
                                                'pager' => [
                                                    'class' => yii\widgets\LinkPager::className(),
                                                    'firstPageLabel' => Yii::t('app', 'First'),
                                                    'lastPageLabel' => Yii::t('app', 'Last')
                                                ],
                                                'columns' => [[
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{view} '.$updateTemplate,
                                                'contentOptions' => ['nowrap' => 'nowrap'],
                                                'urlCreator' => function ($action, $model, $key, $index) {
                                            // using the column name as key, not mapping to 'id' like the standard generator
                                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                                            $params[0] = 'icsr-test' . '/' . $action;
                                            return $params;
                                        },
                                                'buttons' => [
                                                ],
                                                'controller' => 'icsr-test'
                                                    ],
                                                    [
                                                        'attribute' => 'id',
                                                        'value' => function ($model,$key,$index){
                                                            return ++$index;
                                                        }
                                                    ],
                                                            'date',
                                                            'result',
                                                            'result_unit',
                                                            'normal_low_range',
                                                            'normal_high_range',
                                                            'more_info',
                                                        ]
                                                    ]) . '</div>'
                                                    ?>
                                                <?php Pjax::end() ?>
                                                    <?php $this->endBlock() ?>



                                        <?php $this->beginBlock('IcsrHistory'); ?>

                                        <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

                                            </div></div><?php Pjax::begin(['id' => 'pjax-IcsrHistory', 'enableReplaceState' => false, 'linkSelector' => '#pjax-IcsrHistory ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
                                        <?=
                                        '<div class="table-responsive">' . \yii\grid\GridView::widget([
                                            'layout' => '{summary}{pager}<br/>{items}{pager}',
                                            'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getIcsrTrails(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-icsrhistories']]),
                                            'pager' => [
                                                'class' => yii\widgets\LinkPager::className(),
                                                'firstPageLabel' => Yii::t('app', 'First'),
                                                'lastPageLabel' => Yii::t('app', 'Last')
                                            ],
                                            'columns' => ['user_id',  'action', 'model','field','old_value', 'new_value', 'created']
                                        ]) . '</div>'
                                        ?>
                                        <?php Pjax::end() ?>
                                        <?php $this->endBlock() ?>


                                                    <?php
                                                    echo Tabs::widget(
                                                            [
                                                                'id' => 'relation-tabs',
                                                                'encodeLabels' => false,
                                                                'items' => [ [
                                                                        'label' => '<b class=""># ' . Yii::t('app','ICSR') . '</b>',
                                                                        'content' => $this->blocks['backend\modules\crud\models\Icsr'],
                                                                        'active' => true,
                                                                    ], [
                                                                        'content' => $this->blocks['DrugPrescriptions'],
                                                                        'label' => '<small>Drug Prescriptions <span class="badge badge-default">' . count($model->getDrugPrescriptions()->asArray()->all()) . '</span></small>',
                                                                        'active' => false,
                                                                    ],
                                                                    [
                                                                        'content' => $this->blocks['IcsrEvents'],
                                                                        'label' => '<small>Icsr Events <span class="badge badge-default">' . count($model->getIcsrEvents()->asArray()->all()) . '</span></small>',
                                                                        'active' => false,
                                                                    ], [
                                                                        'content' => $this->blocks['IcsrTests'],
                                                                        'label' => '<small>Icsr Tests <span class="badge badge-default">' . count($model->getIcsrTests()->asArray()->all()) . '</span></small>',
                                                                        'active' => false,
                                                                    ], [
                                                                        'content' => $this->blocks['IcsrReporters'],
                                                                        'label' => '<small>Icsr Reporters <span class="badge badge-default">' . count($model->getIcsrReporters()->asArray()->all()) . '</span></small>',
                                                                        'active' => false,
                                                                    ],[
                                                                        'content' => $this->blocks['IcsrHistory'],
                                                                        'label' => '<small>Icsr History <span class="badge badge-default">' . count($model->getIcsrTrails()->asArray()->all()) . '</span></small>',
                                                                        'active' => false,

                                                                    ]
                                                                ]
                                                            ]
                                                    );
                                                    ?>
</div>
