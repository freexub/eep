<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Планы ЭУИ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить план', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'discipline',
            'type.name',
            [
                'attribute' => 'deadline',
                'format' => ['date', 'php:d.m.Y'],
                'filter' => false
            ],
            [
                'label' => 'Кафедра',
                'attribute' => 'cathedra.short_name',
            ],
            'status.name',
            [
                'label' => 'Язык',
                'attribute' => 'languages.name',
            ],
            //'note:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {certificate}',
                'buttons'=>[
                    'certificate' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-download-alt"></span>', $url, [
                            'title' => 'Загрузить сертификат',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
