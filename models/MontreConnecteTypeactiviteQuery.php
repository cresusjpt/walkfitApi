<?php

namespace app\models;
use \yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MontreConnecteTypeactivite]].
 *
 * @see MontreConnecteTypeactivite
 */
class MontreConnecteTypeactiviteQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MontreConnecteTypeactivite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteTypeactivite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
