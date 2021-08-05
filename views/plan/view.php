<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'План ЭУИ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'name',
                'label' => 'Название ЭУИ',
            ],
            [
                'attribute' => 'cathedra.name',
                'label' => 'Кафедра',
            ],
            'discipline',
            'type.name',
            'url:ntext',
            'deadline',
            [
                'attribute' => 'languages.name',
                'label' => 'Язык',
            ],
            'status.name',
            'note:ntext',
        ],
    ]) ?>

</div>