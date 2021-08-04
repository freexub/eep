<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_speciality".
 *
 * @property int $id
 * @property string $name Специальность
 * @property string $code Шифр
 */
class PlanSpeciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name'], 'string', 'max' => 250],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Специальность',
            'code' => 'Шифр',
        ];
    }
}
