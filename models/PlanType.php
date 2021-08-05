<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_type".
 *
 * @property int $id
 * @property string $name Тип ЭУИ
 *
 * @property Plan[] $plans
 */
class PlanType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип',
        ];
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['type_id' => 'id']);
    }
}
