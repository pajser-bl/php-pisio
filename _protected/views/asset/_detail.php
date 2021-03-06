<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */

?>
<div class="asset-view">

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
        'status',
        'type',
        'acquired',
        'price',
        'amortization',
        [
//            'attribute' => 'person.title',
            'attribute' => 'person.fullName',
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
</div>
