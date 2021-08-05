<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $discipline Дисциплина
 * @property int $type_id Тип ЭУИ
 * @property string $url Ссылка
 * @property string $deadline Срок сдачи
 * @property string $name Название ЭУИ
 * @property int $language Язык разработки
 * @property int $cathedra_id Кафедра
 * @property int $status_id Статус
 * @property string $note Замечание
 *
 * @property PlanStatus $status
 * @property PlanType $type
 * @property PlanCathedra $cathedra
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discipline', 'type_id', 'deadline', 'name', 'language', 'cathedra_id'], 'required'],
            [['type_id', 'cathedra_id', 'status_id', 'language'], 'integer'],
            [['url', 'note'], 'string'],
//            [['deadline'], 'safe'],
            [['discipline', 'name'], 'string', 'max' => 250],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['cathedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanCathedra::className(), 'targetAttribute' => ['cathedra_id' => 'id']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => PlanLanguage::className(), 'targetAttribute' => ['language' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discipline' => 'Дисциплина',
            'type_id' => 'Тип ЭУИ',
            'url' => 'Ссылка',
            'deadline' => 'Срок сдачи',
            'name' => 'Название ЭУИ',
            'language' => 'Язык разработки',
            'cathedra_id' => 'Кафедра',
            'status_id' => 'Статус',
            'note' => 'Замечание',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(PlanStatus::className(), ['id' => 'status_id']);
    }

    public function getAllStatus()
    {
        return PlanStatus::find()->all();
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PlanType::className(), ['id' => 'type_id']);
    }

    public function getAllType()
    {
        return PlanType::find()->all();
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

    public function getAllCathedras()
    {
        return PlanCathedra::find()->orderBy('short_name ASC')->all();
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(PlanLanguage::className(), ['id' => 'language']);
    }

    public function getAllLanguage()
    {
        return PlanLanguage::find()->all();
    }
}
