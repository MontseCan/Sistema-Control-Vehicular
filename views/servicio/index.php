<?php

use app\models\Tipo;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Servicio;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;
//use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ServicioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Servicios';
$this->params['breadcrumbs'][] = 'Servicios';
?>
<div class="servicio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Filtrado por:</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>


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
            'attribute' => 'ser_nombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],

        [
            'attribute' => 'ser_fecha',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'ser_lugar',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'unidadNombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'ser_tipo',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete}'),
            'urlCreator' => function ($action, Servicio $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->ser_id]);
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
            'heading' => '<i class="fa-solid fa-screwdriver-wrench"></i> Servicios',
            'footer' => false
        ],
    ]);
    ?>

</div>