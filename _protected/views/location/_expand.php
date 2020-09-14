<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;

$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Location'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Asset'),
        'content' => $this->render('_dataAsset', [
            'model' => $model,
            'row' => $model->assets,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Transfer'),
        'content' => $this->render('_dataTransfer', [
            'model' => $model,
            'row' => $model->transfers,
        ]),
    ],
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Transfer'),
        'content' => $this->render('_dataTransfer0', [
            'model' => $model,
            'row' => $model->transfers,
        ]),
    ],
];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
