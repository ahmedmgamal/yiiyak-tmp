<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $adderess
 * @property string $reg_no
 * @property string $license_no
 * @property string $license_image_url
 *
 * @property \backend\modules\crud\models\Drug[] $drugs
 * @property \backend\modules\crud\models\UserCompany[] $userCompanies
 * @property \backend\modules\crud\models\User[] $users
 * @property string $aliasModel
 */
abstract class Company extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @return string
     */
    public function getAliasModel($plural=false)
    {
        if($plural){
            return Yii::t('app', 'Companies');
        }else{
            return Yii::t('app', 'Company');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','end_date','plan_id'],'required'],
            [['id','plan_id'], 'integer'],
            [['name', 'adderess', 'license_no', 'license_image_url'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'adderess' => Yii::t('app', 'Adderess'),
            'license_no' => Yii::t('app', 'License No'),
            'license_image_url' => Yii::t('app', 'License Image Url'),
            'plan_id' => Yii::t('app','Plan')
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
            'name' => Yii::t('app', 'Name'),
            'adderess' => Yii::t('app', 'Adderess'),
            'license_no' => Yii::t('app', 'License No'),
            'license_image_url' => Yii::t('app', 'License Image Url'),
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(\backend\modules\crud\models\Drug::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanies()
    {
        return $this->hasMany(\backend\modules\crud\models\UserCompany::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\modules\crud\models\User::className(), ['company_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\crud\models\query\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\crud\models\query\CompanyQuery(get_called_class());
    }

    public function getPlan() {
        return $this->hasOne(\backend\modules\crud\models\LkpPlan::className(),['id' =>'plan_id']);
    }

}
