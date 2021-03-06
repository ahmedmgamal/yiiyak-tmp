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
 * @var backend\modules\crud\models\IcsrTest $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="icsr-test-form">

    <?php $form = ActiveForm::begin([
		'id' => 'IcsrTest',
		'layout' => 'horizontal',
		'enableClientValidation' => true,
		'errorSummaryCssClass' => 'error-summary alert alert-error'
	]
);
?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>

<?php  echo       Html::activeHiddenInput($model, 'icsr_id') ; ?>

            <?php echo $form->field($model,'test_name')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'date') ->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd']);  ?>
			<?php echo $form->field($model, 'result')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'result_unit')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'normal_low_range')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'normal_high_range')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'more_info')->textArea(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'image')->fileInput(['multiple'=>'multiple']); ?>

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
