<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_reviewer".
 *
 * @property int $id
 * @property int $cathedra_id
 * @property int $user_id
 *
 * @property User $user
 * @property PlanCathedra $cathedra
 */
class PlanReviewer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_reviewer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cathedra_id', 'user_id'], 'required'],
            [['cathedra_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanCathedra::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cathedra_id' => 'Cathedra ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Cathedra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCathedra()
    {
        return $this->hasOne(PlanCathedra::className(), ['id' => 'cathedra_id']);
    }
}
