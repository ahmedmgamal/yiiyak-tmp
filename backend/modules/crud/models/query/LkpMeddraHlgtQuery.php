<?php

namespace backend\modules\crud\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\crud\models\LkpMeddraHlgt]].
 *
 * @see \backend\modules\crud\models\LkpMeddraHlgt
 */
class LkpMeddraHlgtQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\crud\models\LkpMeddraHlgt[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\crud\models\LkpMeddraHlgt|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
