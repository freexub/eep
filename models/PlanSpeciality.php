<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_speciality".
 *
 * @property int $id
 * @property string $name Специальность
 * @property string $code Шифр
 * @property int $language
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
            [['name', 'name_kz', 'name_en', 'code'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['name_kz'], 'string', 'max' => 64],
            [['name_en'], 'string', 'max' => 64],
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
