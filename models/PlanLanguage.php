<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_language".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 *
 * @property Plan[] $plans
 */
class PlanLanguage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['short_name'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'short_name' => 'Short Name',
        ];
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['language' => 'id']);
    }
}
