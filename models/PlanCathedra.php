<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_cathedra".
 *
 * @property int $id
 * @property string $name
 * @property int $short_name
 * @property int $language
 *
 * @property Plan[] $plans
 */
class PlanCathedra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_cathedra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'language'], 'required'],
            [['name', 'name_kz', 'name_en'], 'string', 'max' => 64],
            [['short_name', 'short_name_kz', 'short_name_en'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Кафедра',
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
        return $this->hasMany(Plan::className(), ['cathedra_id' => 'id']);
    }
}
