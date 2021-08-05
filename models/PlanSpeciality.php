<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_speciality".
 *
 * @property int $id
 * @property string $name Специальность
 * @property string $name_kz
 * @property string $name_en
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
            [['name', 'name_kz', 'name_en', 'code'], 'required'],
            [['name', 'name_kz', 'name_en'], 'string', 'max' => 64],
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
            'name_kz' => 'Name Kz',
            'name_en' => 'Name En',
            'code' => 'Code',
        ];
    }
}
