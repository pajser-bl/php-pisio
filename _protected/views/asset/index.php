<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssetSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Asset';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="asset-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (Yii::$app->user->can('employee'))
            echo Html::a('Create Asset', ['create'], ['class' => 'btn btn-success']);
        ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
    $persons = \app\models\Person::find()->asArray()->all();

    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        [
            'attribute' => 'person_id',
            'label' => 'Person',
            'value' => function ($model) {
                return $model->person->firstname . ' ' . $model->person->lastname;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(), 'id', function ($model) {
                return $model['firstname'] . ' ' . $model['lastname'];
            }),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Person', 'id' => 'grid-asset-search-person_id']
        ],
        [
            'attribute' => 'location_id',
            'label' => 'Location',
            'value' => function ($model) {
                $room = \app\models\Room::findOne($model->location->room_id);
                return $room->name . ' at ' . $room->building->name;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'id', function ($model) {
                $room = \app\models\Room::findOne($model['room_id']);
                return $room->name . ' at ' . $room->building->name;
            }),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Location', 'id' => 'grid-asset-search-location_id']
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'update' => function ($model) {
                    return \Yii::$app->user->can('employee');
                },
                'delete' => function ($model) {
                    return \Yii::$app->user->can('employee');
                },
            ]
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-asset']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]),
        ],
    ]); ?>

</div>
