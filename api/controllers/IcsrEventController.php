<?php

namespace api\controllers;


use yii\filters\AccessControl;
use backend\modules\crud\models\IcsrEvent;
use api\behaviours\Verbcheck;
use api\behaviours\Apiauth;

use Yii;



class IcsrEventController extends RestController
{

    public function behaviors()
    {

        $behaviors = parent::behaviors();

        return $behaviors + [

           'apiauth' => [
               'class' => Apiauth::className(),
               'exclude' => [],
               'callback'=>[]
           ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => Verbcheck::className(),
                'actions' => [
                    'create' => ['POST'],
                    'index' => ['GET']
                ],
            ],

        ];
    }


    public function actionCreate($icsr_id = null, $attributes = null)
    {

        $model = new IcsrEvent;
        if($icsr_id){
            $attributes = json_decode($attributes);

            $model->icsr_id = $icsr_id;
            $model->attributes = (array)$attributes;

        }else{
            $model->attributes = $this->request;
        }
        if ($model->save()) {

            return ['status'=> 'ok'];
        } else {
            Yii::$app->api->sendFailedResponse(['error'=>$model->getErrors()]);
        }

    }
    public function actionIndex($icsr_id){
        $model = IcsrEvent::find()->where(['icsr_id'=>$icsr_id])->all();
        if($model){
            Yii::$app->api->sendSuccessResponse($model);
        }else{
            Yii::$app->api->sendFailedResponse(['error'=>$model->getErrors()]);
        }

    }
}