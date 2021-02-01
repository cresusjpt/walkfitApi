<?php

namespace app\controllers;

use yii\filters\ContentNegotiator;
use \yii\rest\ActiveController;
use yii\web\Response;

class ParticipantController extends ActiveController
{
    public $modelClass = 'app\models\MontreConnecteParticipant';

    public function behaviors()
    {

        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}
