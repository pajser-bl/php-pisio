<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Room */

?>
<div class="room-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
<<<<<<< HEAD
        [
            'attribute' => 'building.name',
            'label' => 'Building',
=======
        [
            'attribute' => 'building.name',
            'label' => 'Building',
>>>>>>> d544a114781609b84ad2cd2b8a06b4be215bdec5
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>