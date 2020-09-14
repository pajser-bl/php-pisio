<<<<<<< HEAD
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Transfer' . ' ' . Html::encode($this->title) ?></h2>
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
            'date',
            [
                'attribute' => 'asset0.name',
                'label' => 'Asset',
            ],
            [
                'attribute' => 'personFrom.fullname',
                'label' => 'Person From',
            ],
            [
                'attribute' => 'personTo.fullname',
                'label' => 'Person To',
            ],
            [
                'attribute' => 'locationFrom.relativelocation',
                'label' => 'Location From',
            ],
            [
                'attribute' => 'locationTo.relativelocation',
                'label' => 'Location To',
            ],
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
    <div class="row">
        <h4>Asset</h4>
    </div>
    <?php
    $gridColumnAsset = [
        ['attribute' => 'id', 'visible' => true],
        'name',
        'description',
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        'person_id',
        'location_id',
    ];
    echo DetailView::widget([
        'model' => $model->asset0,
        'attributes' => $gridColumnAsset]);
    ?>
    <div class="row">
        <h4>Location From</h4>
    </div>
    <?php
    $gridColumnLocation = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        'relativelocation',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model->locationFrom,
        'attributes' => $gridColumnLocation]);
    ?>
    <div class="row">
        <h4>Location To</h4>
    </div>
    <?php
    $gridColumnLocation = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        'relativelocation',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model->locationTo,
        'attributes' => $gridColumnLocation]);
    ?>
    <div class="row">
        <h4>Person From</h4>
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
        'model' => $model->personFrom,
        'attributes' => $gridColumnPerson]);
    ?>
    <div class="row">
        <h4>Person To</h4>
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
        'model' => $model->personTo,
        'attributes' => $gridColumnPerson]);
    ?>
</div>
=======
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Transfer' . ' ' . Html::encode($this->title) ?></h2>
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
            'date',
            [
                'attribute' => 'asset0.name',
                'label' => 'Asset',
            ],
            [
                'attribute' => 'personFrom.fullname',
                'label' => 'Person From',
            ],
            [
                'attribute' => 'personTo.fullname',
                'label' => 'Person To',
            ],
            [
                'attribute' => 'locationFrom.relativelocation',
                'label' => 'Location From',
            ],
            [
                'attribute' => 'locationTo.relativelocation',
                'label' => 'Location To',
            ],
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
    <div class="row">
        <h4>Asset</h4>
    </div>
    <?php
    $gridColumnAsset = [
        ['attribute' => 'id', 'visible' => true],
        'name',
        'description',
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        'person_id',
        'location_id',
    ];
    echo DetailView::widget([
        'model' => $model->asset0,
        'attributes' => $gridColumnAsset]);
    ?>
    <div class="row">
        <h4>Location From</h4>
    </div>
    <?php
    $gridColumnLocation = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        'relativelocation',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model->locationFrom,
        'attributes' => $gridColumnLocation]);
    ?>
    <div class="row">
        <h4>Location To</h4>
    </div>
    <?php
    $gridColumnLocation = [
        ['attribute' => 'id', 'visible' => false],
        'lat',
        'lon',
        'relativelocation',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model->locationTo,
        'attributes' => $gridColumnLocation]);
    ?>
    <div class="row">
        <h4>Person From</h4>
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
        'model' => $model->personFrom,
        'attributes' => $gridColumnPerson]);
    ?>
    <div class="row">
        <h4>Person To</h4>
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
        'model' => $model->personTo,
        'attributes' => $gridColumnPerson]);
    ?>
</div>
>>>>>>> d544a114781609b84ad2cd2b8a06b4be215bdec5
