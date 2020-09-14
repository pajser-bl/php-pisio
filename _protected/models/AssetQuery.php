<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Asset]].
 *
 * @see Asset
 */
class AssetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Asset[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Asset|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
