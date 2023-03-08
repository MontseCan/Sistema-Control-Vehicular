<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Registro;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;
//use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RegistroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Registros';
$this->params['breadcrumbs'][] = 'Bitácoras';
?>
<div class="registro-index">

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
            'attribute' => 'reg_salidaFecha',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'reg_entradaFecha',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],



        [
            'attribute' => 'reg_conductor',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'unidadNombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'unidadModelo',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => User::hasRole(['controlarias' ,'administradores'], false) ? '{view}' : (User::hasRole(['encargados'], false) ? '{view}': '{view} {update}  {delete}'),
            //'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete}'),
            'urlCreator' => function ($action, Registro $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->reg_id]);
            }
        ],

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
                    'title' => 'Agregar Bitácora',
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
            'heading' => '<i class="fa-solid fa-calendar-check"></i> Bitácoras',
            'footer' => false
        ],
    ]);
    ?>

</div>