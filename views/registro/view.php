<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Registro $model */

$this->title = $model->UnidadNombre;
$this->params['breadcrumbs'][] = ['label' => 'Bitácoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registro-view">

    <h1><?php // Html::encode($this->title) 
        ?></h1>

    <?php if ($model->reg_fkdetalleE == null or $model->reg_entradaFecha == null) { ?>
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

                            'attribute' => 'reg_conductor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'unidadNombre',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 2: SALIDA',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'reg_salidaFecha',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'reg_fkdetalleS',
                            'format' => 'html',
                            'value' => HTML::a(
                                'Ver Check List',
                                ['/detalle/view/', 'id' => $model->reg_fkdetalleS],
                                [
                                    'class' => 'btn btn-outline-danger',
                                    'target' => '_blank',
                                ]
                            ),
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                
                [
                    'group' => true,
                    'label' => 'SECCIÓN 3: NO SE HA REGISTRADO ENTRADA',
                    'rowOptions' => ['class' => 'table-danger']
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
    <?php } ?>
    <?php if ($model->reg_entradaFecha != null && $model->reg_fkdetalleE != null) { ?>

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

                            'attribute' => 'reg_conductor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'unidadNombre',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 2: SALIDA',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'reg_salidaFecha',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'reg_fkdetalleS',
                            'format' => 'html',
                            'value' => HTML::a(
                                'Ver Check List',
                                ['/detalle/view/', 'id' => $model->reg_fkdetalleS],
                                [
                                    'class' => 'btn btn-outline-danger',
                                    'target' => '_blank',
                                ]
                            ),
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'group' => true,
                    'label' => 'SECCIÓN 3: ENTRADA',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'reg_entradaFecha',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'reg_fkdetalleE',
                            'format' => 'html',
                            'value' => HTML::a(
                                'Ver Check List',
                                ['/detalle/view/', 'id' => $model->reg_fkdetalleE],
                                [
                                    'class' => 'btn btn-outline-danger',
                                    'target' => '_blank',
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

    <?php } ?>

    <p>
        <?php if ($model->reg_fkdetalleE == null or $model->reg_entradaFecha == null) { ?>
            <?= Html::a('Modificar', ['update', 'id' => $model->reg_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->reg_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar este elemento?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Regresar', ['index', 'id' => $model->reg_id], ['class' => 'btn btn-secondary']) ?>

        <?php } ?>
        <?php if ($model->reg_entradaFecha != null && $model->reg_fkdetalleE != null) { ?>
            <?= Html::a('Regresar', ['index', 'id' => $model->reg_id], ['class' => 'btn btn-secondary']) ?>

        <?php } ?>
    </p>

</div>