<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Transfer';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="transfer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if (Yii::$app->user->can('employee'))
            echo Html::a('Create Transfer', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
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
        'date',
        [
                'attribute' => 'asset',
                'label' => 'Asset',
                'value' => function($model){
                    return $model->asset0->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Asset::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Asset', 'id' => 'grid-transfer-search-asset']
            ],
        [
                'attribute' => 'person_from',
                'label' => 'Person From',
                'value' => function($model){
                    if ($model->personFrom)
                    {return $model->personFrom->firstname.' '.$model->personFrom->lastname;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(), 'id', function ($model){return $model['firstname'].' '.$model['lastname'];}),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Person', 'id' => 'grid-transfer-search-person_from']
            ],
        [
                'attribute' => 'person_to',
                'label' => 'Person To',
                'value' => function($model){
                    if ($model->personTo)
                    {return $model->personTo->firstname.' '.$model->personTo->lastname;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(), 'id', function ($model){return $model['firstname'].' '.$model['lastname'];}),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Person', 'id' => 'grid-transfer-search-person_to']
            ],
        [
                'attribute' => 'location_from',
                'label' => 'Location From',
                'value' => function ($model) {
                    $room = \app\models\Room::findOne($model->locationFrom->room_id);
                    return $room->name . ' at ' . $room->building->name.'/'.$model->locationFrom->description;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'id', function ($model) {
                    $room = \app\models\Room::findOne($model['room_id']);
                    return $room->name . ' at ' . $room->building->name;
                }),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Location', 'id' => 'grid-transfer-search-location_from']
            ],
        [
                'attribute' => 'location_to',
                'label' => 'Location To',
                'value' => function ($model) {
                    $room = \app\models\Room::findOne($model->locationTo->room_id);
                    return $room->name . ' at ' . $room->building->name.'/'.$model->locationTo->description;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'id', function ($model) {
                    $room = \app\models\Room::findOne($model['room_id']);
                    return $room->name . ' at ' . $room->building->name;
                }),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Location', 'id' => 'grid-transfer-search-location_to']
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-transfer']],
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
            ]) ,
        ],
    ]); ?>

</div>
