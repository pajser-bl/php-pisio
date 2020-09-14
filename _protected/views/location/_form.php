<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Asset',
        'relID' => 'asset',
        'value' => \yii\helpers\Json::encode($model->assets),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Transfer',
        'relID' => 'transfer',
        'value' => \yii\helpers\Json::encode($model->transfers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'lat')->textInput(['placeholder' => 'Lat']) ?>

    <?= $form->field($model, 'lon')->textInput(['placeholder' => 'Lon']) ?>

    <?= $form->field($model, 'description')->textInput(['placeholder' => 'Description']) ?>

    <?= $form->field($model, 'room_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Room::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
            $building = \app\models\Building::findOne($model['building_id']);
            return $model['name'] . ' at ' . $building->name;
        }),
        'options' => ['placeholder' => 'Choose Room'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Room'); ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Asset'),
            'content' => $this->render('_formAsset', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->assets),
            ]),
        ],
//        [
//            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Transfer'),
//            'content' => $this->render('_formTransfer', [
//                'row' => \yii\helpers\ArrayHelper::toArray($model->transfers),
//            ]),
//        ],
//        [
//            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Transfer'),
//            'content' => $this->render('_formTransfer0', [
//                'row' => \yii\helpers\ArrayHelper::toArray($model->transfers0),
//            ]),
//        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
