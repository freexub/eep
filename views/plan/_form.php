<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discipline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($model->getAllType(), 'id', 'name'),[
        'prompt' => 'Выбрать ...'
    ]) ?>

    <?= $form->field($model, 'deadline')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'language')->dropDownList(ArrayHelper::map($model->getAllLanguage(), 'id', 'name'),[
        'prompt' => 'Выбрать ...'
    ]) ?>

    <?= $form->field($model, 'cathedra_id')->dropDownList(ArrayHelper::map($model->getAllCathedras(), 'id', 'short_name'),[
        'prompt' => 'Выбрать ...'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
