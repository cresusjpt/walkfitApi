<?php

namespace app\models;

use \yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MontreConnecteActivite]].
 *
 * @see MontreConnecteActivite
 */
class MontreConnecteActiviteQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MontreConnecteActivite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MontreConnecteActivite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
