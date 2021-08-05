<?php

use app\models\PlanType;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

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

            [
                'attribute'=>'type_id',
                'filter'=>Html::activeDropDownList($searchModel, 'type_id', ArrayHelper::map(PlanType::find()->all(), 'id', 'name'), ['class'=>'form-control','prompt' => ' ']),
            ],

            [
                'attribute' => 'deadline', 'format' => ['date', 'php:d.m.Y'],
                'filter' => false
            ],

            'cathedra.short_name',
            'status.name',
            'languages.short_name',
            //'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
