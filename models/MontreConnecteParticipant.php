<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "Montre_Connecte_participant".
 *
 * @property int $id
 * @property string $email
 * @property string $date_naiss
 * @property string $genre
 *
 * @property MontreConnecteActivite[] $montreConnecteActivites
 */
class MontreConnecteParticipant extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Montre_Connecte_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'date_naiss', 'genre'], 'required'],
            [['date_naiss'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['genre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'date_naiss' => Yii::t('app', 'Date Naiss'),
            'genre' => Yii::t('app', 'Genre'),
        ];
    }

    /**
     * Gets query for [[MontreConnecteActivites]].
     *
     * @return \yii\db\ActiveQuery|MontreConnecteActiviteQuery
     */
    public function getMontreConnecteActivites()
    {
        return $this->hasMany(MontreConnecteActivite::class, ['idparticipant_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteParticipantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MontreConnecteParticipantQuery(get_called_class());
    }
}
