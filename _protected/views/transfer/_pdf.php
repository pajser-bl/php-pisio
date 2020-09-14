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
            <h2><?= 'Transfer'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'date',
        [
                'attribute' => 'asset0.name',
                'label' => 'Asset'
            ],
        [
                'attribute' => 'personFrom.title',
                'label' => 'Person From'
            ],
        [
                'attribute' => 'personTo.title',
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
