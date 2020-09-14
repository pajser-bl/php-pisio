<<<<<<< HEAD
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = $model->room->name . ' at ' . $model->room->building->name;
$this->params['breadcrumbs'][] = ['label' => 'Location', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Location' . ' ' . Html::encode($this->title) ?></h2>
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

            <?php if (Yii::$app->user->can('employee'))
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php if (Yii::$app->user->can('employee'))
                echo Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'lat',
            'lon',
            'description',
            [
                'attribute' => 'room.name',
                'label' => 'Room',
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
        if ($providerAsset->totalCount) {
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
                    'attribute' => 'person.fullname',
                    'label' => 'Person'
                ],
            ];
            echo Gridview::widget([
                'dataProvider' => $providerAsset,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-asset']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Asset'),
                ],
                'columns' => $gridColumnAsset
            ]);
        }
        ?>

    </div>
    <div class="row">
        <h4>Room</h4>
    </div>
    <?php
    $gridColumnRoom = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        ['attribute' => 'building.name', 'label' => 'Building']
    ];
    echo DetailView::widget([
        'model' => $model->room,
        'attributes' => $gridColumnRoom]);
    ?>


    <?php

    use voime\GoogleMaps\Map;

    echo Map::widget([
        'apiKey' => 'AIzaSyDEvDe_sg3iMQhLF9mBysEpNnv0mqfPYnY',
        'zoom' => 5,
        'width' => '700px',
        'height' => '400px',
        'center' => [$model->lat, $model->lon],
        'markers' => [
            ['position' => [$model->lat, $model->lon], 'title' => 'Asset location'],
        ]
    ]);
    ?>


</div>
=======
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = $model->room->name . ' at ' . $model->room->building->name;
$this->params['breadcrumbs'][] = ['label' => 'Location', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Location' . ' ' . Html::encode($this->title) ?></h2>
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

            <?php if (Yii::$app->user->can('employee'))
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php if (Yii::$app->user->can('employee'))
                echo Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'lat',
            'lon',
            'description',
            [
                'attribute' => 'room.name',
                'label' => 'Room',
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
        if ($providerAsset->totalCount) {
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
                    'attribute' => 'person.fullname',
                    'label' => 'Person'
                ],
            ];
            echo Gridview::widget([
                'dataProvider' => $providerAsset,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-asset']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Asset'),
                ],
                'columns' => $gridColumnAsset
            ]);
        }
        ?>

    </div>
    <div class="row">
        <h4>Room</h4>
    </div>
    <?php
    $gridColumnRoom = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        ['attribute' => 'building.name', 'label' => 'Building']
    ];
    echo DetailView::widget([
        'model' => $model->room,
        'attributes' => $gridColumnRoom]);
    ?>


    <?php

    use voime\GoogleMaps\Map;

    echo Map::widget([
        'apiKey' => 'AIzaSyDEvDe_sg3iMQhLF9mBysEpNnv0mqfPYnY',
        'zoom' => 5,
        'width' => '700px',
        'height' => '400px',
        'center' => [$model->lat, $model->lon],
        'markers' => [
            ['position' => [$model->lat, $model->lon], 'title' => 'Asset location'],
        ]
    ]);
    ?>


</div>
>>>>>>> d544a114781609b84ad2cd2b8a06b4be215bdec5
