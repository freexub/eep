<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_author".
 *
 * @property int $id
 * @property int $plan_id План
 * @property int $author_id Автор
 *
 * @property Plan $plan
 */
class PlanAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'author_id'], 'required'],
            [['plan_id', 'author_id'], 'integer'],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_id' => 'Plan ID',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'plan_id']);
    }
}
