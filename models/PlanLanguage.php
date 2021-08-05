<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_language".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
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
            'name' => 'Язык',
            'short_name' => 'Код',
        ];
    }
}
