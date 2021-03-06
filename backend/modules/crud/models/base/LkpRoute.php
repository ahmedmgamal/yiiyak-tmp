<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "lkp_route".
 *
 * @property integer $id
 * @property string $description
 *
 * @property \backend\modules\crud\models\Drug[] $drugs
 * @property string $aliasModel
 */
abstract class LkpRoute extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lkp_route';
    }

    /**
     * Alias name of table for crud viewsLists all Area models.
     * Change the alias name manual if needed later
     * @return string
     */
    public function getAliasModel($plural=false)
    {
        if($plural){
            return Yii::t('app', 'LkpRoutes');
        }else{
            return Yii::t('app', 'LkpRoute');
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
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
            'description' => Yii::t('app', 'Auricular (otic) 
Epidural   
Intramuscular
Intravenous
Ophthalmic
Oral
Rectal
Respiratory
Subcutaneous
Topical
Transdermal
Vaginal
Sublingual
Other'),
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(\backend\modules\crud\models\Drug::className(), ['route_lkp_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\crud\models\query\LkpRouteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\crud\models\query\LkpRouteQuery(get_called_class());
    }


}
