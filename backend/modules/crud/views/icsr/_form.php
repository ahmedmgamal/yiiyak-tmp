<?php

use yii\helpers\Html;
use \dmstr\bootstrap\Tabs;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\jui\Accordion;

/**
* @var yii\web\View $this
* @var backend\modules\crud\models\Icsr $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="icsr-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Icsr',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
                         Html::activeHiddenInput($model, 'drug_id') ;
   
 ; ?>
                        			<?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
$form->field($model, 'report_type')->dropDownList(
    \yii\helpers\ArrayHelper::map(backend\modules\crud\models\LkpIcsrType::find()->all(), 'id', 'description')
       ,['prompt' => Yii::t('app', 'Select')]
); ?>
            
			<?php echo $form->field($model, 'patient_identifier')->textInput(['maxlength' => true]) ?>

            <?php echo $form->field($model, 'patient_age')->textInput(['maxlength' => true,
                'onchange' =>'changeDates()'])
            ?>


            <?php echo $form->field($model, 'patient_age_unit')->dropDownList(
                            \yii\helpers\ArrayHelper::map(backend\modules\crud\models\LkpTimeUnit::find()->all(), 'id', 'name'),
                        ['onchange'=>'changeDates()']
                        );
            ?>

            <?php echo $form->field($model, 'patient_birth_date')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'onSelect' => new \yii\web\JsExpression('function(dateText, inst) {  var now =new Date();  console.log( now.getFullYear() - inst.currentYear) }'),
                ] ]); ?>
			<?php echo $form->field($model, 'patient_weight')->textInput(['maxlength' => true]) ?>
			<?php echo $form->field($model, 'patient_weight_unit')->dropDownList(
                            \yii\helpers\ArrayHelper::map(backend\modules\crud\models\LkpWeightUnit::find()->all(), 'id', 'name')

                        ); ?>
			<?php echo $form->field($model, 'extra_history')->textArea(['maxlength' => true]) ;?>


 <fieldset>
            <legend><?= $form->field($model, 'is_serious')->checkbox() ?></legend>
            <div id="showSeriousBoxes">
<?= $form->field($model, 'results_in_death')->checkbox() ?>
<?= $form->field($model, 'life_threatening')->checkbox() ?>
<?= $form->field($model, 'requires_hospitalization')->checkbox() ?>
<?= $form->field($model, 'results_in_disability')->checkbox() ?>
<?= $form->field($model, 'is_congenital_anomaly')->checkbox() ?>
<?= $form->field($model, 'others_significant')->checkbox() ?>
            </div>
</fieldset>


 
 
 

	     
            
			<?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
$form->field($model, 'lkp_city_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(backend\modules\crud\models\LkpCity::find()->all(), 'id', 'name'),
    ['prompt' => Yii::t('app', 'Select')]
); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
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

        <?= Html::submitButton(
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



<?php $this->registerJsFile('@web/crud/icsr/js/custom.js', ['depends' => [\yii\web\JqueryAsset::className()]]);?>
<?php $this->registerCssFile('@web/crud/icsr/css/custom.css',['depends' => [\yii\bootstrap\BootstrapAsset::className()]])?>


