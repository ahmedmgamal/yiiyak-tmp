<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\crud\models\Rmp $model
*/

$this->title = Yii::t('app', 'Rmp') . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rmps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud rmp-update">

    <h1>
        <?= Yii::t('app', 'Rmp') ?>
        <small>
                        <?= $model->id ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
