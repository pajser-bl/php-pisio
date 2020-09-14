<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->transfers,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'transfer'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
