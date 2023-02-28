<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Detalle $model */

$this->title = 'Número de Serie de la Unidad:'. ' '.$model->getUnidadNombre();
$this->params['breadcrumbs'][] = ['label' => 'Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalle-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'group' => true,
                'label' => 'SECCIÓN 1: INFORMACIÓN BÁSICA',
                'rowOptions' => ['class' => 'table-danger']
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'unidadNombre',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'det_fecha',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],
   
            [
                'group' => true,
                'label' => 'SECCIÓN 2: NIVELES',
                'rowOptions' => ['class' => 'table-danger']
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'det_aceite',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_liqfreno',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_anticongelante',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            
            [
                'columns' => [
                    [

                        'attribute' => 'det_hidraulico',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_combustible',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],


            [
                'group' => true,
                'label' => 'SECCIÓN 3: INTERIOR',
                'rowOptions' => ['class' => 'table-danger']
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'det_asiento',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_cinturon',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_claxon',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            
            [
                'columns' => [
                    [

                        'attribute' => 'det_tablero',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_clima',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_antena',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            [
                'columns' => [
                    [

                        'attribute' => 'det_encendedor',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_tapete',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            [
                'group' => true,
                'label' => 'SECCIÓN 4: EXTERIOR',
                'rowOptions' => ['class' => 'table-danger']
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'det_carroceria',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_trasera',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_delantera',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            
            [
                'columns' => [
                    [

                        'attribute' => 'det_tapon',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_parabrisa',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_limparabrisa',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            [
                'columns' => [
                    [

                        'attribute' => 'det_rines',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_retrovisores',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            [
                'group' => true,
                'label' => 'SECCIÓN 5: LUCES',
                'rowOptions' => ['class' => 'table-danger']
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'det_luces',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_lucDelantera',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    
                    [
                        'attribute' => 'det_reversa',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            
            [
                'columns' => [
                    [

                        'attribute' => 'det_lucInterior',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                    [
                        'attribute' => 'det_lucDireccional',
                        'valueColOptions' => ['style' => 'width:15%'],
                    ],
                ],
            ],

            
            [
                'group' => true,
                'label' => 'SECCIÓN 6: COMENTARIOS',
                'rowOptions' => ['class' => 'table-danger']
            ],

            [
                'attribute' => 'det_comentario',
                'format' => 'raw',
                'value' => '<span class="text-justify">' . $model->det_comentario . '</span>',
                'type' => DetailView::INPUT_TEXTAREA,
                'options' => ['rows' => 4],
                'valueColOptions' => ['style' => 'width:25%']
            ]

        ],
        'condensed' => false,
        'responsive' => true,
        'striped' => false,
        'bordered' => true,
        'hover' => true,
        //'hAlign' => $hAlign,
        //'vAlign' => $vAlign,
        //'fadeDelay' => $fadeDelay,
        
        'panel' => [
            'type' => 'danger',
            'heading' => '<i class="fa-solid fa-car-side"></i> Unidades',
            'footer' => false
        ],
    ]);
    ?>
    
<p>
        <?= Html::a('Modificar', ['update', 'id' => $model->det_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->det_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->det_id], ['class' => 'btn btn-secondary']) ?>
    </p>

</div>
