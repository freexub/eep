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
            [['short_name', 'language'], 'integer'],
            [['name'], 'string', 'max' => 150],
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
            'language' => 'Language',
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
