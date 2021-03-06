<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\crud\models\base;

use Yii;

/**
 * This is the base-model class for table "prsu".
 *
 * @property integer $id
 * @property integer $drug_id
 * @property string $version
 * @property string $version_description
 * @property string $prsu_file_url
 * @property string $ack_file_url
 * @property integer $prsu_created_by
 * @property string $prsu_created_at
 * @property integer $ack_created_by
 * @property string $ack_created_at
 * @property string $next_prsu_date
 * @property string $aliasModel
 */
abstract class Prsu extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prsu';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_id', 'prsu_created_by','prsu_file_url','version','next_prsu_date'], 'required'],
            [['drug_id', 'prsu_created_by', 'ack_created_by'], 'integer'],
            [['version'], 'number'],
            [['prsu_created_at', 'ack_created_at', 'next_prsu_date'], 'safe'],
            [['next_prsu_date'],'date','format' => 'php:Y-m-d'],
            [['version_description', 'prsu_file_url', 'ack_file_url'], 'string', 'max' => 255],
            [['drug_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drug::className(), 'targetAttribute' => ['drug_id' => 'id']],
            [['prsu_created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['prsu_created_by' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_id' => 'Drug ID',
            'version' => 'Version',
            'version_description' => 'Version Description',
            'prsu_file_url' => 'PBRER File Url',
            'ack_file_url' => 'Ack File Url',
            'prsu_created_by' => 'PBRER Created By',
            'prsu_created_at' => 'PBRER Created At',
            'ack_created_by' => 'Letter Header Created By',
            'ack_created_at' => 'Letter Header Created At',
            'next_prsu_date' => 'Next Submission Date',
        ];
    }


    public function getPrsuUser ()
    {
        return $this->hasOne(\backend\modules\crud\models\User::className(),['id' => 'prsu_created_by']);
    }

    public function getPrsuAckUser()
    {
        return $this->hasOne(\backend\modules\crud\models\User::className(),['id' => 'ack_created_by']);

    }

}
