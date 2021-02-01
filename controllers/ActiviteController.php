<?php

namespace app\controllers;

use app\models\MontreConnecteActivite;
use \yii\filters\ContentNegotiator;
use \yii\rest\ActiveController;
use yii\web\Response;

class ActiviteController extends ActiveController
{
    public $modelClass = 'app\models\MontreConnecteActivite';


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

    public function actionToday($idParticipant)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $date = date('Y-m-d');

        $outputs = MontreConnecteActivite::find()->where([
            'date_activite' => $date,
            'idparticipant_id' => $idParticipant
        ])->orderBy([
            'heure_debut' => SORT_ASC,
        ])->distinct()->all();

        return $outputs;
    }

    public function actionByDate($date, $idParticipant)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $date = \DateTime::createFromFormat('Y-m-d', $date)->format('Y-m-d');

        $outputs = MontreConnecteActivite::find()->where([
            'date_activite' => $date,
            'idparticipant_id' => $idParticipant
        ])->orderBy([
            'heure_debut' => SORT_ASC,
        ])->distinct()->all();

        return $outputs;
    }

    public function actionPastWeek($idParticipant)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $date = date('Y-m-d');
        $today = \DateTime::createFromFormat('Y-m-d', $date);
        $pastWeekDay = \DateTime::createFromFormat('Y-m-d', $date)->modify('-7 day');

        $todayFormat = $today->format('Y-m-d');
        $pastWeekFormat = $pastWeekDay->format('Y-m-d');

        $outputs = MontreConnecteActivite::find()->select("id, date_activite,heure_debut,heure_fin, SUM(caloris) AS caloris,SUM(pas) AS pas,SUM(distance) AS distance,SUM(minute_active) AS minute_active,SUM(duree) AS duree,idparticipant_id")
            ->where([
                'idparticipant_id' => $idParticipant,
            ])->andWhere([
                'between', 'date_activite', $pastWeekFormat, $todayFormat
            ])->groupBy([
                'date_activite'
            ])->orderBy([
                'date_activite' => SORT_ASC,
                'heure_debut' => SORT_ASC,
            ])->distinct()->all();
        return $outputs;
    }

    public function actionAllActivity($idParticipant)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return $outputs = MontreConnecteActivite::find()->where([
            'idparticipant_id' => $idParticipant
        ])->orderBy([
            'date_activite' => SORT_ASC,
            'heure_debut' => SORT_ASC,
        ])->all();
    }

    public function actionIntervallDays($last, $first, $idParticipant)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $firstdate = \DateTime::createFromFormat('Y-m-d', $first)->format('Y-m-d');
        $lastdate = \DateTime::createFromFormat('Y-m-d', $last)->format('Y-m-d');

        $outputs = MontreConnecteActivite::find()->select("id, date_activite,heure_debut,heure_fin, SUM(caloris) AS caloris,SUM(pas) AS pas,SUM(distance) AS distance,SUM(minute_active) AS minute_active,SUM(duree) AS duree,idparticipant_id")
            ->where([
                'idparticipant_id' => $idParticipant,
            ])->andWhere([
                'between', 'date_activite', $lastdate, $firstdate
            ])->groupBy([
                'date_activite'
            ])->orderBy([
                'date_activite' => SORT_ASC,
                'heure_debut' => SORT_ASC,
            ])->distinct()->all();
        return $outputs;
    }

    public function actionMonthActivity($last, $first, $idParticipant){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $firstdate = \DateTime::createFromFormat('Y-m-d', $first)->format('Y-m-d');
        $lastdate = \DateTime::createFromFormat('Y-m-d', $last)->format('Y-m-d');

        $outputs = MontreConnecteActivite::find()->select("id, WEEK(`date_activite`) AS semaine, date_activite,heure_debut,heure_fin, SUM(caloris) AS caloris,SUM(pas) AS pas,SUM(distance) AS distance,SUM(minute_active) AS minute_active,SUM(duree) AS duree,idparticipant_id")
            ->where([
                'idparticipant_id' => $idParticipant,
            ])->andWhere([
                'between', 'date_activite', $lastdate, $firstdate
            ])->groupBy([
                'semaine'
            ])->orderBy([
                'date_activite' => SORT_ASC,
                'heure_debut' => SORT_ASC,
            ])->distinct()->all();
        return $outputs;
    }

}
