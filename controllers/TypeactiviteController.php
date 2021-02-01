<?php

namespace app\controllers;
use \yii\rest\ActiveController;

class TypeactiviteController extends ActiveController
{
    public function behaviors()
    {

        return [

            [

                'class' => \yii\filters\ContentNegotiator::class,

                'only' => ['index', 'view'],

                'formats' => [

                    'application/json' => \yii\web\Response::FORMAT_JSON,

                ],

            ],

        ];
    }


    public $modelClass = 'app\models\MontreConnecteTypeactivite';
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

}
