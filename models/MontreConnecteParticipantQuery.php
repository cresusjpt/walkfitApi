<?php

namespace app\models;
use \yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MontreConnecteParticipant]].
 *
 * @see MontreConnecteParticipant
 */
class MontreConnecteParticipantQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MontreConnecteParticipant[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteParticipant|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
