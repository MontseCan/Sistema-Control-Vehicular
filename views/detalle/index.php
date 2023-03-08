<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Detalle;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use kartik\export\ExportMenu;
use webvimark\modules\UserManagement\models\User;
//use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetalleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Detalles';
$this->params['breadcrumbs'][] = 'CheckList';
?>
<div class="detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Filtrado por:</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '20px',
            'pageSummary' => 'Total',
            'pageSummaryOptions' => ['colspan' => 10],
            'header' => 'N°',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],

        [
            'attribute' => 'det_fecha',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],

        [
            'attribute' => 'unidadNombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete} {pdf}'),
            'urlCreator' => function ($action, Detalle $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->det_id]);
            }
        ],
    ];
    ?>
    
    <?php
    $fullExportMenu = ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'dropdownOptions' => [
            'label' => '',
            'class' => 'btn btn-outline-secondary btn-default',
            'itemsBefore' => [
                '<div class="dropdown-header">Exportar</div>',
            ],
        ],
        
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_CSV => false,
            ExportMenu::FORMAT_EXCEL_X => [
                'label' => 'XLS',
            ],
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_PDF => [],
        ]


    ]);
    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],
        'responsive' => true,
        'striped' => false,
        'bordered' => true,
        'hover' => true,
        'exportContainer' => [
            'class' => 'btn-group mr-2 me-2'
        ],
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
                    'title' => 'Agregar Check list',
                ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => 'Limpiar',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            $fullExportMenu,
            '{toggleData}',

        ],
        'panel' => [
            'type' => 'danger',
            'heading' => '<i class="fas fa-chart-bar"></i> CheckList',
            'footer' => false
        ],
    ]);
    ?>

</div>