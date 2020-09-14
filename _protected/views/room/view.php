<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Room', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Room'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        [
            'attribute' => 'building.name',
            'label' => 'Building',
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
if($providerLocation->totalCount){
    $gridColumnLocation = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'lat',
            'lon',
            'description',
                ];
    echo Gridview::widget([
        'dataProvider' => $providerLocation,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-location']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Location'),
        ],
        'columns' => $gridColumnLocation
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Building<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBuilding = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model->building,
        'attributes' => $gridColumnBuilding    ]);
    ?>
</div>
