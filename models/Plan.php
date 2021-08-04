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
 * @property string $language Язык разработки
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
            [['discipline', 'type_id', 'url', 'deadline', 'name', 'language', 'cathedra_id', 'status_id', 'note'], 'required'],
            [['type_id', 'cathedra_id', 'status_id'], 'integer'],
            [['url', 'note'], 'string'],
            [['deadline'], 'safe'],
            [['discipline', 'name'], 'string', 'max' => 250],
            [['language'], 'string', 'max' => 10],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanType::className(), 'targetAttribute' => ['type_id' => 'id']],
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

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PlanType::className(), ['id' => 'type_id']);
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
