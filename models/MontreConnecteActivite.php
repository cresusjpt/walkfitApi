<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Montre_Connecte_activite".
 *
 * @property int $id
 * @property string $date_activite
 * @property string $heure_debut
 * @property string $heure_fin
 * @property float $caloris
 * @property int $pas
 * @property float $distance
 * @property int $minute_active
 * @property int $duree
 * @property float $latitude
 * @property float $longitude
 * @property int $idparticipant_id
 *
 * @property MontreConnecteParticipant $idparticipant
 */
class MontreConnecteActivite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Montre_Connecte_activite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_activite', 'heure_debut', 'heure_fin', 'caloris', 'pas', 'distance', 'minute_active', 'duree', 'latitude', 'longitude', 'idparticipant_id'], 'required'],
            [['date_activite', 'heure_debut', 'heure_fin'], 'safe'],
            [['caloris', 'distance', 'latitude', 'longitude'], 'number'],
            [['pas', 'minute_active', 'duree', 'idparticipant_id'], 'integer'],
            [['idparticipant_id'], 'exist', 'skipOnError' => true, 'targetClass' => MontreConnecteParticipant::class, 'targetAttribute' => ['idparticipant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date_activite' => Yii::t('app', 'Date Activite'),
            'heure_debut' => Yii::t('app', 'Heure Debut'),
            'heure_fin' => Yii::t('app', 'Heure Fin'),
            'caloris' => Yii::t('app', 'Caloris'),
            'pas' => Yii::t('app', 'Pas'),
            'distance' => Yii::t('app', 'Distance'),
            'minute_active' => Yii::t('app', 'Minute Active'),
            'duree' => Yii::t('app', 'Duree'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'idparticipant_id' => Yii::t('app', 'Idparticipant ID'),
        ];
    }

    /**
     * Gets query for [[Idparticipant]].
     *
     * @return \yii\db\ActiveQuery|MontreConnecteParticipantQuery
     */
    public function getIdparticipant()
    {
        return $this->hasOne(MontreConnecteParticipant::class, ['id' => 'idparticipant_id']);
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteActiviteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MontreConnecteActiviteQuery(get_called_class());
    }
}
