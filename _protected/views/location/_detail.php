<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

?>
<div class="location-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
</div>