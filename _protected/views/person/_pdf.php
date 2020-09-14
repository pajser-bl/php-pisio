<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Person', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Person'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'lastname',
        'firstname',
        'employment',
        'title',
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
                'attribute' => 'location.relativelocation',
                'label' => 'Location'
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
                'attribute' => 'locationFrom.id',
                'label' => 'Location From'
            ],
        [
                'attribute' => 'locationTo.id',
                'label' => 'Location To'
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
