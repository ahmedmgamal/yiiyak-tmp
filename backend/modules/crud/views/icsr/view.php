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

$this->title = $model->getAliasModel() . $model->id;
$this->params['breadcrumbs'][] = ['label' => $model->getDrug()->one()->trade_name, 'url' => ['/crud/drug/view', 'id' => $model->getDrug()->one()->id]];
$this->params['breadcrumbs'][] = ['label' => $model->getAliasModel(true), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
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
            <?= $model->id ?>        </small>
    </h1>


    <div class="clearfix crud-navigation">
        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?php echo Html::a('<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('app', 'Export  Xml'), ['export', 'id' => $model->id], ['class' => 'btn btn-success', 'target' => '_blank']) ?>
        </div>


    </div>


    <?php $this->beginBlock('backend\modules\crud\models\Icsr'); ?>


    <?php    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'drug_id',
                'value' => ($model->getDrug()->one() ? Html::a($model->getDrug()->one()->id, ['/crud/drug/view', 'id' => $model->getDrug()->one()->id,]) : '<span class="label label-warning">?</span>'),
            ],
            // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'report_type',
                'value' => ($model->getIcsrType()->one() ? Html::a($model->getIcsrType()->one()->description, ['lkp-country/view', 'id' => $model->getIcsrType()->one()->id,]) : '<span class="label label-warning">?</span>'),
            ],
            'patient_identifier',
            'patient_age',
            [
                'attribute' => 'patient_age_unit',
                'value' => backend\modules\crud\models\Icsr::getPatientAgeUnitValueLabel($model->patient_age_unit),
            ],
            'patient_birth_date',
            'patient_weight',
            [
                'attribute' => 'patient_weight_unit',
                'value' => backend\modules\crud\models\Icsr::getPatientWeightUnitValueLabel($model->patient_weight_unit),
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
                'value' => ($model->getReactionCountry()->one() ? Html::a($model->getReactionCountry()->one()->name, ['lkp-country/view', 'id' => $model->getReactionCountry()->one()->id,]) : '<span class="label label-warning">?</span>'),
            ],
        ],
    ]);
    ?>


    <hr/>

    <?php
    echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]);
    ?>
    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('DrugPrescriptions'); ?>
    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>

            <?php
            echo Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Drug Prescription', ['/crud/drug-prescription/create', 'DrugPrescription' => ['icsr_id' => $model->id]], ['class' => 'btn btn-success btn-xs']
            );
            ?>
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
        'template' => '{view} {update}',
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
            'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'drug_id',
                'value' => function ($model) {
                    if ($rel = $model->getDrug()->one()) {
                        return Html::a($rel->trade_name, ['/crud/drug/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                        'format' => 'raw',
                    ],
                    'dose',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'frequency_lkp_id',
                        'value' => function ($model) {
                            if ($rel = $model->getFrequencyLkp()->one()) {
                                return Html::a($rel->description, ['/crud/lkp-frequency/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                            } else {
                                return '';
                            }
                        },
                                'format' => 'raw',
                            ],
                            'expiration_date',
                            'lot_no',
                            'use_date_start',
                            'use_date_end',
                        ]
                    ]) . '</div>'
                    ?>
                    <?php Pjax::end() ?>
                    <?php $this->endBlock() ?>


                    <?php $this->beginBlock('IcsrEvents'); ?>
                    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
                            <?=
                            Html::a(
                                    '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Icsr Events', ['icsr-event/index'], ['class' => 'btn text-muted btn-xs']
                            )
                            ?>
                            <?=
                            Html::a(
                                    '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Event', ['icsr-event/create', 'IcsrEvent' => ['icsr_id' => $model->id]], ['class' => 'btn btn-success btn-xs']
                            );
                            ?>
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
                        'template' => '{view} {update}',
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
                            'id',
                            'event_description',
                            'event_outcome',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                            [
                                'class' => yii\grid\DataColumn::className(),
                                'attribute' => 'meddra_llt_id',
                                'value' => function ($model) {
                                    if ($rel = $model->getMeddraLlt()->one()) {
                                        return Html::a($rel->id, ['lkp-meddra-llt/view', 'id' => $rel->id,], ['data-pjax' => 0]);
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
                                        'value' => function ($model) {
                                            if ($rel = $model->getMeddraPt()->one()) {
                                                return Html::a($rel->id, ['lkp-meddra-pt/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                                            } else {
                                                return '';
                                            }
                                        },
                                                'format' => 'raw',
                                            ],
                                            'event_date',
                                        ]
                                    ]) . '</div>'
                                    ?>
                                    <?php Pjax::end() ?>
                                <?php $this->endBlock() ?>



                                            <?php $this->beginBlock('IcsrReporters'); ?>
                                    <div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
                                            <?=
                                            Html::a(
                                                    '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Icsr Reporters', ['icsr-reporter/index'], ['class' => 'btn text-muted btn-xs']
                                            )
                                            ?>
                                            <?=
                                            Html::a(
                                                    '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Reporter', ['icsr-reporter/create', 'IcsrReporter' => ['icsr_id' => $model->id]], ['class' => 'btn btn-success btn-xs']
                                            );
                                            ?>
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
                                        'template' => '{view} {update}',
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
                                            'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                                            [
                                                'class' => yii\grid\DataColumn::className(),
                                                'attribute' => 'country_lkp_id',
                                                'value' => function ($model) {
                                                    if ($rel = $model->getCountryLkp()->one()) {
                                                        return Html::a($rel->name, ['lkp-country/view', 'id' => $rel->id,], ['data-pjax' => 0]);
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
                                                    <?=
                                                    Html::a(
                                                            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Icsr Tests', ['icsr-test/index'], ['class' => 'btn text-muted btn-xs']
                                                    )
                                                    ?>
                                                    <?=
                                                    Html::a(
                                                            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Icsr Test', ['icsr-test/create', 'IcsrTest' => ['icsr_id' => $model->id]], ['class' => 'btn btn-success btn-xs']
                                                    );
                                                    ?>
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
                                                'template' => '{view} {update}',
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
                                                    'id',
// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
                                                    [
                                                        'class' => yii\grid\DataColumn::className(),
                                                        'attribute' => 'test_lkp_id',
                                                        'value' => function ($model) {
                                                            if ($rel = $model->getTestLkp()->one()) {
                                                                return Html::a($rel->name, ['lkp-test/view', 'id' => $rel->id,], ['data-pjax' => 0]);
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
                                                                        'label' => '<b class=""># ' . $model->id . '</b>',
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
                                                                    ],]
                                                            ]
                                                    );
                                                    ?>
</div>
