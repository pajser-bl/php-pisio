<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-transfer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'asset')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Asset::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'person_from')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->orderBy('id')->asArray()->all(), 'id', function ($model){return $model['firstname'].' '.$model['lastname'];}),
        'options' => ['placeholder' => 'Choose Person'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'person_to')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->orderBy('id')->asArray()->all(), 'id', function ($model){return $model['firstname'].' '.$model['lastname'];}),
        'options' => ['placeholder' => 'Choose Person'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php  echo $form->field($model, 'location_from')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
            $room = \app\models\Room::findOne($model['room_id']);
            return $room->name . ' at ' . $room->building->name.'('.$model['description'].')';
        }),
        'options' => ['placeholder' => 'Choose Location'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Location From');  ?>

    <?php  echo $form->field($model, 'location_to')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
            $room = \app\models\Room::findOne($model['room_id']);
            return $room->name . ' at ' . $room->building->name.'('.$model['description'].')';
        }),
        'options' => ['placeholder' => 'Choose Location'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Location To');  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
