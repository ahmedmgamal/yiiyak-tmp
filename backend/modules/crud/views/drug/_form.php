<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/4b7e79a8340461fe629a6ac612644d03
 *
 * @package default
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\jui\DatePicker;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\Drug $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="drug-form">

    <?php $form = ActiveForm::begin([
		'id' => 'Drug',
		'layout' => 'horizontal',
		'enableClientValidation' => true,
		'errorSummaryCssClass' => 'error-summary alert alert-error'
	]
);
?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>

			<?php echo $form->field($model, 'generic_name')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'trade_name')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'composition')->textInput(['maxlength' => true]) ?>

			<?php echo $form->field($model, 'strength')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'route_lkp_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(backend\modules\crud\models\LkpRoute::find()->all(), 'id', 'description'),
	['prompt' => Yii::t('app', 'Select')]
); ?>

			<?php echo $form->field($model, 'manufacturer')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model,'rmp_first_deadline')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd','clientOptions' => ['minDate' => date('Y-m-d') , 'changeYear'=>'true' ,  'changeMonth'=>'true' , 'yearRange' => '+0:+50']]);?>

		</p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [ [
				'label'   => $model->getAliasModel(),
				'content' => $this->blocks['main'],
				'active'  => true,
			], ]
	]
);
?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?php echo Html::submitButton(
	'<span class="glyphicon glyphicon-check"></span> ' .
	($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
	[
		'id' => 'save-' . $model->formName(),
		'class' => 'btn btn-success'
	]
);
?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
