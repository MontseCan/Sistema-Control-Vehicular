<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Unidad $model */

$this->title = 'Numero de Serie de la Unidad:' . ' ' . $model->uni_serie;
$this->params['breadcrumbs'][] = ['label' => 'Unidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidad-view">

    <h1><?php // Html::encode($this->title) 
        ?></h1>

    <?php if ($model->uni_tarjeta == null) { ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                [
                    'attribute' => 'uni_foto',
                    'format' => 'html',
                    'value' => Html::img(yii\helpers\Url::to('@web/' . $model->uni_foto), ['width' => '250px']),
                    'hAlign' => 'center',

                    'valueColOptions' => ['style' => 'width:25%'],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 1: INFORMACIÓN BÁSICA',
                    'rowOptions' => ['class' => 'table-danger']
                ],
                [
                    'columns' => [
                        [

                            'attribute' => 'uni_modelo',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_marca',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_anio',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_placa',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'columns' => [
                        [

                            'attribute' => 'uni_serie',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_motor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],
                [
                    'columns' => [
                        [

                            'attribute' => 'empresaNombre',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_color',
                            'type' => DetailView::INPUT_COLOR,
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'group' => true,
                    'label' => 'SECCIÓN 2: NO HAY TARJETA DE CIRCULACIÓN',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [
                            'attribute' => 'uni_tenencia',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 3: INFORMACIÓN ADICIONAL',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [
                            'attribute' => 'uni_descripcion',
                            'format' => 'raw',
                            'value' => '<span class="text-justify">' . $model->uni_descripcion . '</span>',
                            'type' => DetailView::INPUT_TEXTAREA,
                            'options' => ['rows' => 4],
                            'valueColOptions' => ['style' => 'width:25%']
                        ],
                        [
                            'attribute' => 'uni_comentario',
                            'format' => 'raw',
                            'value' => '<span class="text-justify">' . $model->uni_comentario . '</span>',
                            'type' => DetailView::INPUT_TEXTAREA,
                            'options' => ['rows' => 4],
                            'valueColOptions' => ['style' => 'width:25%']
                        ]
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_extintor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_cruz',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_gato',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_manual',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_cable',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_rines',
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
                'heading' => '<i class="fa-solid fa-car-side"></i>' . ' Numero de Serie de la Unidad:' . ' ' . $model->uni_serie,
                'buttons' => false,
                'footer' => false
            ],
        ]);
        ?>

    <?php } ?>
    <?php if ($model->uni_tarjeta != null) { ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                [
                    'attribute' => 'uni_foto',
                    'format' => 'html',
                    'value' => Html::img(yii\helpers\Url::to('@web/' . $model->uni_foto), ['width' => '250px']),
                    'hAlign' => 'center',

                    'valueColOptions' => ['style' => 'width:25%'],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 1: INFORMACIÓN BÁSICA',
                    'rowOptions' => ['class' => 'table-danger']
                ],
                [
                    'columns' => [
                        [

                            'attribute' => 'uni_modelo',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_marca',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_anio',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_placa',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'columns' => [
                        [

                            'attribute' => 'uni_serie',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_motor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],
                [
                    'columns' => [
                        [

                            'attribute' => 'empresaNombre',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_color',
                            'type' => DetailView::INPUT_COLOR,
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'group' => true,
                    'label' => 'SECCIÓN 2: TARJETA DE CIRCULACIÓN',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [
                            'attribute' => 'uni_tarjeta',
                            'format' => 'html',  'value' => HTML::a(
                                'Ver Tarjeta',
                                '@web/' . $model->uni_tarjeta,
                                [
                                    'class' => 'btn btn-outline-danger',
                                    'target' => '_blank',
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Se reedigirá a la Tarjeta de circulación'
                                ]
                            ),
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],

                        [
                            'attribute' => 'uni_tenencia',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],


                [
                    'group' => true,
                    'label' => 'SECCIÓN 3: INFORMACIÓN ADICIONAL',
                    'rowOptions' => ['class' => 'table-danger']
                ],

                [
                    'columns' => [
                        [
                            'attribute' => 'uni_descripcion',
                            'format' => 'raw',
                            'value' => '<span class="text-justify">' . $model->uni_descripcion . '</span>',
                            'type' => DetailView::INPUT_TEXTAREA,
                            'options' => ['rows' => 4],
                            'valueColOptions' => ['style' => 'width:25%']
                        ],
                        [
                            'attribute' => 'uni_comentario',
                            'format' => 'raw',
                            'value' => '<span class="text-justify">' . $model->uni_comentario . '</span>',
                            'type' => DetailView::INPUT_TEXTAREA,
                            'options' => ['rows' => 4],
                            'valueColOptions' => ['style' => 'width:25%']
                        ]
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_extintor',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_cruz',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_gato',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_manual',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                    ],
                ],

                [
                    'columns' => [
                        [

                            'attribute' => 'uni_cable',
                            'valueColOptions' => ['style' => 'width:25%'],
                        ],
                        [
                            'attribute' => 'uni_rines',
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
                'heading' => '<i class="fa-solid fa-car-side"></i>' . ' Numero de Serie de la Unidad:' . ' ' . $model->uni_serie,
                'buttons' => false,
                'footer' => false
            ],
        ]);
        ?>
    <?php } ?>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->uni_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->uni_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->uni_id], ['class' => 'btn btn-secondary']) ?>
    </p>

</div>