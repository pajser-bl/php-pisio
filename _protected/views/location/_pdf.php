<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Location', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Location'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        [
                'attribute' => 'room.name',
                'label' => 'Room'
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerAsset->totalCount){
    $gridColumnAsset = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        [
                'attribute' => 'person.title',
                'label' => 'Person'
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerAsset,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Asset'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnAsset
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerTransfer->totalCount){
    $gridColumnTransfer = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'date',
        [
                'attribute' => 'asset0.name',
                'label' => 'Asset'
            ],
        [
                'attribute' => 'personFrom.title',
                'label' => 'Person From'
            ],
        [
                'attribute' => 'personTo.title',
                'label' => 'Person To'
            ],
                    ];
    echo Gridview::widget([
        'dataProvider' => $providerTransfer,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Transfer'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnTransfer
    ]);
}
?>
    </div>
</div>
