<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "montre_connecte_typeactivite".
 *
 * @property int $id
 * @property string $nom
 * @property int $numero
 */
class MontreConnecteTypeactivite extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'montre_connecte_typeactivite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'numero'], 'required'],
            [['numero'], 'integer'],
            [['nom'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nom' => Yii::t('app', 'Nom'),
            'numero' => Yii::t('app', 'Numero'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteTypeactiviteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MontreConnecteTypeactiviteQuery(get_called_class());
    }
}
