<<<<<<< HEAD
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Person', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Person' . ' ' . Html::encode($this->title) ?></h2>
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
                    'attribute' => 'location.id',
                    'label' => 'Location'
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
        <?php
        if ($providerTransfer->totalCount) {
            $gridColumnTransfer = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'date',
                [
                    'attribute' => 'asset0.name',
                    'label' => 'Asset'
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

    </div>
</div>
=======
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Person', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Person' . ' ' . Html::encode($this->title) ?></h2>
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
                    'attribute' => 'location.id',
                    'label' => 'Location'
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
        <?php
        if ($providerTransfer->totalCount) {
            $gridColumnTransfer = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'date',
                [
                    'attribute' => 'asset0.name',
                    'label' => 'Asset'
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

    </div>
</div>
>>>>>>> d544a114781609b84ad2cd2b8a06b4be215bdec5
