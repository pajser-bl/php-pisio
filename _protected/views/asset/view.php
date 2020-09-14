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
            <h2><?= 'Asset' . ' ' . Html::encode($this->title) ?></h2>
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
            ) ?>

            <?php if (Yii::$app->user->can('employee')) echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php if (Yii::$app->user->can('employee')) echo Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'status',
            'type',
            'acquired',
            'price',
            'amortization',
            [
                'attribute' => 'person.fullname',
                'label' => 'Person',
            ],
            [
                'attribute' => 'location.relativelocation',
                'label' => 'Location',
            ],
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
    <div class="row">
        <h4>Location</h4>
    </div>
    <?php
    $gridColumnLocation = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        'description',
        'room_id',
    ];
    echo DetailView::widget([
        'model' => $model->location,
        'attributes' => $gridColumnLocation]);
    ?>
    <div class="row">
        <h4>Person</h4>
    </div>
    <?php
    $gridColumnPerson = [
        ['attribute' => 'id', 'visible' => false],
        'lastname',
        'firstname',
        'employment',
        'title',
    ];
    echo DetailView::widget([
        'model' => $model->person,
        'attributes' => $gridColumnPerson]);
    ?>

    <div class="row">
        <?php
        if ($providerTransfer->totalCount) {
            $gridColumnTransfer = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'date',
                [
                    'attribute' => 'personFrom.fullname',
                    'label' => 'Person From'
                ],
                [
                    'attribute' => 'personTo.fullname',
                    'label' => 'Person To'
                ],
                [
                    'attribute' => 'locationFrom.relativelocation',
                    'label' => 'Location From'
                ],
                [
                    'attribute' => 'locationTo.relativelocation',
                    'label' => 'Location To'
                ],
            ];
            echo Gridview::widget([
                'dataProvider' => $providerTransfer,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-transfer']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Transfer'),
                ],
                'columns' => $gridColumnTransfer
            ]);
        }
        ?>

        <?php

        use voime\GoogleMaps\Map;

        if (isset($model->location->lat) && isset($model->location->lon) && $model->location->lon !== '' && $model->location->lat !== '') {

            echo Map::widget([
                'apiKey' => 'AIzaSyDEvDe_sg3iMQhLF9mBysEpNnv0mqfPYnY',
                'zoom' => 5,
                'width' => '700px',
                'height' => '400px',
                'center' => [$model->location->lat, $model->location->lon],
                'markers' => [
                    ['position' => [$model->location->lat, $model->location->lon], 'title' => 'Asset location'],
                ]
            ]);
        }
        ?>
    </div>
</div>
