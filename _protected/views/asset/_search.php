<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-asset-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'placeholder' => 'Type']) ?>

    <?php /* echo $form->field($model, 'acquired')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Acquired',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) */ ?>

    <?php /* echo $form->field($model, 'amortization')->textInput(['maxlength' => true, 'placeholder' => 'Amortization']) */ ?>

    <?php echo $form->field($model, 'person_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
            return $model['firstname'] . ' ' . $model['lastname'];
        }),
        'options' => ['placeholder' => 'Choose Person'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->textInput()->label('Person'); ?>

    <?php echo $form->field($model, 'location_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
            $room = \app\models\Room::findOne($model['room_id']);
            return $room->name . ' at ' . $room->building->name;
        }),
        'options' => ['placeholder' => 'Choose Location'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Location'); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
