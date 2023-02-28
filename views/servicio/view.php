<?php

use yii\helpers\Html;

use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Servicio $model */

$this->title = 'Servicio:' . ' ' . $model->ser_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servicio-view">

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

                        'attribute' => 'ser_nombre',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'ser_lugar',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],

            [
                'columns' => [
                    [

                        'attribute' => 'ser_fecha',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'ser_precio',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],


            [
                'columns' => [
                    [

                        'attribute' => 'ser_kilometraje',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'ser_proximo',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],
            [
                'columns' => [
                    [

                        'attribute' => 'unidadNombre',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'ser_tipo',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],

            [
                'group' => true,
                'label' => 'SECCIÓN 2: DOCUMENTOS',
                'rowOptions' => ['class' => 'table-danger']
            ],

            [
                'columns' => [
                    [
                        'attribute' => 'ser_factura',
                        'format' => 'html',  'value' => HTML::a(
                            'Ver Factura',
                            '@web/' . $model->ser_factura,
                            [
                                'class' => 'btn btn-outline-danger',
                                'target' => '_blank',
                                'data-toggle' => 'tooltip',
                                'title' => 'Se reedigirá a la Factura'
                            ]
                        ),
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'ser_cotizacion',
                        'format' => 'html',  'value' => HTML::a(
                            'Ver Cotización',
                            '@web/' . $model->ser_cotizacion,
                            [
                                'class' => 'btn btn-outline-danger',
                                'data-toggle' => 'tooltip',
                                'title' => 'Se reedigirá a la Cotización'
                            ]
                        ),
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],

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
            'heading' => '<i class="fa-solid fa-screwdriver-wrench"></i> Servicios',
            'footer' => false
        ],
    ]);
    ?>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ser_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ser_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->ser_id], ['class' => 'btn btn-secondary']) ?>
    </p>

</div>