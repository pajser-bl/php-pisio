<div class="form-group" id="add-transfer">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Transfer',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'asset' => [
            'label' => 'Asset',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Asset::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Asset'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'person_to' => [
            'label' => 'Person To',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->orderBy('id')->asArray()->all(), 'id', function ($model){return $model['firstname'].' '.$model['lastname'];}),
                'options' => ['placeholder' => 'Choose Person'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'location_from' => [
            'label' => 'Location From',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
                    $room = \app\models\Room::findOne($model['room_id']);
                    return $room->name . ' at ' . $room->building->name . '/' . $model['description'];
                }),
                'options' => ['placeholder' => 'Choose Location'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'location_to' => [
            'label' => 'Location To',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->orderBy('id')->asArray()->all(), 'id', function ($model) {
                    $room = \app\models\Room::findOne($model['room_id']);
                    return $room->name . ' at ' . $room->building->name . '/' . $model['description'];
                }),
                'options' => ['placeholder' => 'Choose Location'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowTransfer(' . $key . '); return false;', 'id' => 'transfer-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Transfer', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTransfer()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

