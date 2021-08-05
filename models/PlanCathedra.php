<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_cathedra".
 *
 * @property int $id
 * @property string $name
 * @property string $name_kz
 * @property string $name_en
 * @property string $short_name
 * @property string $short_name_kz
 * @property string $short_name_en
 *
 * @property Plan[] $plans
 * @property PlanReviewer[] $planReviewers
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
            [['name', 'name_kz', 'name_en', 'short_name', 'short_name_kz', 'short_name_en'], 'required'],
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
            'name_kz' => 'Кафедра',
            'name_en' => 'Department',
            'short_name' => 'Short Name',
            'short_name_kz' => 'Short Name Kz',
            'short_name_en' => 'Short Name En',
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

    /**
     * Gets query for [[PlanReviewers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanReviewers()
    {
        return $this->hasMany(PlanReviewer::className(), ['cathedra_id' => 'id']);
    }
}
