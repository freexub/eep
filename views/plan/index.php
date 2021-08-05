<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'План ЭУИ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'discipline',

            // Тип ЭУИ
            [
                'attribute'=>'type.name',
                'filter'=>Html::activeDropDownList($searchModel, 'type_id', ArrayHelper::map($type_query, 'id', 'name'), ['class'=>'form-control','prompt' => ' ']),
            ],

            // Дата
            [
                'attribute' => 'deadline', 
                'value' => 'deadline',
                'format' => ['date', 'php:d.m.Y'],
                'filter' => DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'deadline',
                    'language' => 'ru',
                    'dateFormat' => 'php:Y-m-d',
                    'options' => ['class' => 'form-control'],
                ]),
            ],

            // Сокращённое название кафедры
            [
                'attribute'=>'cathedra.short_name',
                'filter'=>Html::activeDropDownList($searchModel, 'cathedra_id', ArrayHelper::map($cathedra_short_name_query, 'id', 'short_name'), ['class'=>'form-control','prompt' => ' ']),
            ],

            // Статус плана
            [
                'attribute'=>'status.name',
                'filter'=>Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map($status_query, 'id', 'name'), ['class'=>'form-control','prompt' => ' ']),
            ],

            // Сокращённое название языка
            [
                'attribute'=>'languages.short_name',
                'filter'=>Html::activeDropDownList($searchModel, 'language', ArrayHelper::map($language_query, 'id', 'short_name'), ['class'=>'form-control','prompt' => ' ']),
            ],

            //'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
