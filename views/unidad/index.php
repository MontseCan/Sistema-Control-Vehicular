<?php

use yii\helpers\Url;
use app\models\Unidad;
use kartik\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\UnidadSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Unidades';
$this->params['breadcrumbs'][] = 'Unidades';
?>

<div class="unidad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Filtrado por:</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?php
    $colorPluginOptions =  [
        'showPalette' => true,
        'showPaletteOnly' => true,
        'showSelectionPalette' => true,
        'showAlpha' => false,
        'allowEmpty' => false,
        'preferredFormat' => 'name',
        'palette' => [
            [
                "white", "black", "grey", "silver", "gold", "brown",
            ],
            [
                "red", "orange", "yellow", "indigo", "maroon", "pink"
            ],
            [
                "blue", "green", "violet", "cyan", "magenta", "purple",
            ],
        ]
    ];
    ?>
    <?php
    $gridColumns = [
        [
            'class'=>'kartik\grid\SerialColumn',
            'contentOptions'=>['class'=>'kartik-sheet-style'],
            'width'=>'20px',
            'pageSummary'=>'Total',
            'pageSummaryOptions' => ['colspan' => 10],
            'header'=>'N°',
            'headerOptions'=>['class'=>'kartik-sheet-style']
        ],

        [
            'attribute' => 'uni_modelo',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],

        [
            'attribute' => 'uni_marca',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'uni_serie',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'uni_motor',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'uni_anio',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'uni_tenencia',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'empresaNombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'uni_color',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'value' => function ($model, $key, $index, $widget) {
                return "<span class='badge' style='background-color: {$model->uni_color}'> </span>  <code>" . $model->uni_color . '</code>';
            },
            'width' => '15%',
            'filterType' => GridView::FILTER_COLOR,
            'filterWidgetOptions' => [
                'showDefaultPalette' => false,
                'pluginOptions' => $colorPluginOptions,
            ],

            'format' => 'raw',
        ],

        [
            'attribute' => 'uni_placa',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete}'),
            'urlCreator' => function ($action, Unidad $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->uni_id]);
            }
        ]
    ];
    ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'responsive' => true,
        'striped' => false,
        'bordered' => true,
        'hover' => true,
        'exportConfig' => [
            'xls' => [
                'label' => 'XLS',
            ],
            'pdf' => [],
        ],
        'toolbar' => [
            [
                'content' =>
                Html::a('<i class="fas fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-success',
                    'title' => 'Agregar Unidad',
                ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => 'Limpiar',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            '{toggleData}'

        ],
        'panel' => [
            'type' => 'danger',
            'heading' => '<i class="fa-solid fa-car-side"></i> Unidades',
            'footer' => false
        ],
    ]);

    ?>


</div>