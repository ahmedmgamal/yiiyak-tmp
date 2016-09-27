<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "icsr".
 *
 * @property integer $id
 * @property integer $drug_id
 * @property string $patient_identifier
 * @property string $patient_age
 * @property string $patient_age_unit
 * @property string $patient_birth_date
 * @property string $patient_weight
 * @property string $patient_weight_unit
 * @property string $extra_history
 * @property string $is_serious
 * @property string $results_in_death
 * @property string $life_threatening
 * @property string $requires_hospitalization
 * @property string $results_in_disability
 * @property string $is_congenital_anomaly
 * @property string $others_significant
 * @property string $report_type
 * @property integer $reaction_country_id
 *
 * @property \backend\modules\crud\models\DrugPrescription[] $drugPrescriptions
 * @property \backend\modules\crud\models\LkpCountry $reactionCountry
 * @property \backend\modules\crud\models\Drug $drug
 * @property \backend\modules\crud\models\IcsrConcomitantDrugs[] $icsrConcomitantDrugs
 * @property \backend\modules\crud\models\IcsrEvent[] $icsrEvents
 * @property \backend\modules\crud\models\IcsrOutcome[] $icsrOutcomes
 * @property \backend\modules\crud\models\LkpIcsrOutcome[] $icsrOutcomeLkps
 * @property \backend\modules\crud\models\IcsrReporter[] $icsrReporters
 * @property \backend\modules\crud\models\IcsrTest[] $icsrTests
 * @property \backend\modules\crud\models\IcsrType $icsrType
 * @property \backend\modules\crud\models\LkpIcsrType[] $icsrTypeLkps
 * @property \backend\modules\crud\models\LkpTimeUnit $ageUnit
 * @property \backend\modules\crud\models\LkpWeightUnit $patientWeightUnit
 * @property string $aliasModel
 */
abstract class Icsr extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */

    const PATIENT_WEIGHT_UNIT_LBS = 'lbs';
    const PATIENT_WEIGHT_UNIT_KGS = 'kgs';
    const IS_SERIOUS_YES = 'yes';
    const IS_SERIOUS_NO = 'no';
    const RESULTS_IN_DEATH_YES = 'yes';
    const RESULTS_IN_DEATH_NO = 'no';
    const LIFE_THREATENING_YES = 'yes';
    const LIFE_THREATENING_NO = 'no';
    const REQUIRES_HOSPITALIZATION_YES = 'yes';
    const REQUIRES_HOSPITALIZATION_NO = 'no';
    const RESULTS_IN_DISABILITY_YES = 'yes';
    const RESULTS_IN_DISABILITY_NO = 'no';
    const IS_CONGENITAL_ANOMALY_YES = 'yes';
    const IS_CONGENITAL_ANOMALY_NO = 'no';
    const OTHERS_SIGNIFICANT_YES = 'yes';
    const OTHERS_SIGNIFICANT_NO = 'no';

    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icsr';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @return string
     */
    public function getAliasModel($plural=false)
    {
        if($plural){
            return Yii::t('app', 'Icsrs');
        }else{
            return Yii::t('app', 'Icsr');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_id','reaction_country_id'], 'required'],
            [['drug_id', 'reaction_country_id'], 'integer'],
            [['patient_age', 'patient_weight'], 'number'],
            [['patient_age_unit', 'patient_weight_unit', 'report_type'], 'string'],
            [['is_serious', 'results_in_death', 'life_threatening', 'requires_hospitalization', 'results_in_disability', 'is_congenital_anomaly', 'others_significant'],'boolean'],
            [['patient_birth_date'], 'safe'],
            [['patient_identifier', 'extra_history'], 'string', 'max' => 45],
            [['reaction_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => LkpCountry::className(), 'targetAttribute' => ['reaction_country_id' => 'id']],
            [['drug_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drug::className(), 'targetAttribute' => ['drug_id' => 'id']],
 
     
 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'drug_id' => Yii::t('app', 'Drug ID'),
            'patient_identifier' => Yii::t('app', 'Patient Identifier'),
            'patient_age' => Yii::t('app', 'Patient Age'),
            'patient_age_unit' => Yii::t('app', 'Patient Age Unit'),
            'patient_birth_date' => Yii::t('app', 'Patient Birth Date'),
            'patient_weight' => Yii::t('app', 'Patient Weight'),
            'patient_weight_unit' => Yii::t('app', 'Patient Weight Unit'),
            'extra_history' => Yii::t('app', 'Extra History'),
            'is_serious' => Yii::t('app', 'Is Serious'),
            'results_in_death' => Yii::t('app', 'Results In Death'),
            'life_threatening' => Yii::t('app', 'Life Threatening'),
            'requires_hospitalization' => Yii::t('app', 'Requires Hospitalization'),
            'results_in_disability' => Yii::t('app', 'Results In Disability'),
            'is_congenital_anomaly' => Yii::t('app', 'Is Congenital Anomaly'),
            'others_significant' => Yii::t('app', 'Others Significant'),
            'report_type' => Yii::t('app', 'Report Type'),
            'reaction_country_id' => Yii::t('app', 'Reaction Country'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(),
            [
            'id' => Yii::t('app', 'ID'),
            'drug_id' => Yii::t('app', 'Drug Id'),
            'patient_identifier' => Yii::t('app', 'Patient Identifier'),
            'patient_age' => Yii::t('app', 'Patient Age'),
            'patient_age_unit' => Yii::t('app', 'Patient Age Unit'),
            'patient_birth_date' => Yii::t('app', 'Patient Birth Date'),
            'patient_weight' => Yii::t('app', 'Patient Weight'),
            'patient_weight_unit' => Yii::t('app', 'Patient Weight Unit'),
            'extra_history' => Yii::t('app', 'Extra History'),
            'is_serious' => Yii::t('app', 'A.1.5.1 Serious'),
            'results_in_death' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'life_threatening' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'requires_hospitalization' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'results_in_disability' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'is_congenital_anomaly' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'others_significant' => Yii::t('app', 'A.1.5.2 Seriousness criteria -'),
            'report_type' => Yii::t('app', 'A.1.4 Type of report'),
            'reaction_country_id' => Yii::t('app', 'A.1.2 Identification of the country where the reaction/event occurred'),
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugPrescriptions()
    {
        return $this->hasMany(\backend\modules\crud\models\DrugPrescription::className(), ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReactionCountry()
    {
        return $this->hasOne(\backend\modules\crud\models\LkpCountry::className(), ['id' => 'reaction_country_id']);
    }
    public function getAgeUnit()
    {
        return $this->hasOne(\backend\modules\crud\models\LkpTimeUnit::className(), ['id' => 'patient_age_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrug()
    {
        return $this->hasOne(\backend\modules\crud\models\Drug::className(), ['id' => 'drug_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrType()
    {
        return $this->hasOne(\backend\modules\crud\models\LkpIcsrType::className(), ['id' => 'report_type']);
    }
        /**
     * column patient_weight_unit ENUM value labels
     * @return array
     */
    public  function getPatientWeightUnit()
    {
        return $this->hasOne(\backend\modules\crud\models\LkpWeightUnit::className(), ['id' => 'patient_weight_unit']);

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrConcomitantDrugs()
    {
        return $this->hasMany(\backend\modules\crud\models\IcsrConcomitantDrug::className(), ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrEvents()
    {
        return $this->hasMany(\backend\modules\crud\models\IcsrEvent::className(), ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrOutcomes()
    {
        return $this->hasMany(\backend\modules\crud\models\IcsrOutcome::className(), ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrOutcomeLkps()
    {
        return $this->hasMany(\backend\modules\crud\models\LkpIcsrOutcome::className(), ['id' => 'icsr_outcome_lkp_id'])->viaTable('icsr_outcome', ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrReporters()
    {
        return $this->hasMany(\backend\modules\crud\models\IcsrReporter::className(), ['icsr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrTests()
    {
        return $this->hasMany(\backend\modules\crud\models\IcsrTest::className(), ['icsr_id' => 'id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcsrTypeLkps()
    {
        return $this->hasMany(\backend\modules\crud\models\LkpIcsrType::className(), ['id' => 'icsr_type_lkp_id'])->viaTable('icsr_type', ['icsr_id' => 'id']);
    }

public function getCompany() {
    return $this->drug->company;
}


    /**
     * get column patient_age_unit enum value label
     * @param string $value
     * @return string
     */
    public static function getPatientAgeUnitValueLabel($value){
        $labels = self::optsPatientAgeUnit();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

 

    /**
     * get column patient_weight_unit enum value label
     * @param string $value
     * @return string
     */
    public static function getPatientWeightUnitValueLabel($value){
        $labels = self::optsPatientWeightUnit();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }



  
    /**
     * get column report_type enum value label
     * @param string $value
     * @return string
     */
    public static function getReportTypeValueLabel($value){
        $labels = self::optsReportType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }


    public  function isDuplicate ()
    {
        $duplicatePatient = self::find()->where(['drug_id' =>$this->drug_id])
            ->andWhere(['patient_identifier' => $this->patient_identifier])
            ->andWhere(['patient_birth_date' => $this->patient_birth_date])
            ->andWhere(['patient_weight' => $this->patient_weight])
            ->andWhere(['patient_weight_unit' => $this->patient_weight_unit])
            ->andWhere(['reaction_country_id'=> $this->reaction_country_id] )
            ->one();

        if ($duplicatePatient){
            return true;
        }
        return false;
    }

}
