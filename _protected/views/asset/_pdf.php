<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Asset', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Asset'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        [
                'attribute' => 'person.fullName',
                'label' => 'Person'
            ],
        [
                'attribute' => 'location.id',
                'label' => 'Location'
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
if($providerTransfer->totalCount){
    $gridColumnTransfer = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'date',
                [
                'attribute' => 'personFrom.fullName',
                'label' => 'Person From'
            ],
        [
                'attribute' => 'personTo.fullName',
                'label' => 'Person To'
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
