<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Encargado $model */

$this->title = $model->enc_nombre . ' ' . $model->enc_paterno . ' ' . $model->enc_materno;
$this->params['breadcrumbs'][] = ['label' => 'Encargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encargado-view">

    <h1><?php // Html::encode($this->title) 
        ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [


            [
                'attribute' => 'enc_foto',
                'format' => 'html',
                'value' => Html::img(yii\helpers\Url::to($model->enc_foto), ['width' => '100px']),
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
                        'attribute' => 'enc_nombre',
                        'valueColOptions' => ['style' => 'width:10%'],
                    ],
                    [
                        'attribute' => 'enc_paterno',
                        'valueColOptions' => ['style' => 'width:10%'],
                    ],

                    [
                        'attribute' => 'enc_materno',
                        'valueColOptions' => ['style' => 'width:10%'],
                    ],
                ],
            ],

            [
                'columns' => [
                    [

                        'attribute' => 'enc_telefono',

                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'empresaNombre',
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
            'heading' => '<i class="fa-solid fa-user"></i> Encargado',
            'footer' => false
        ],
    ]);
    ?>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->enc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->enc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->enc_id], ['class' => 'btn btn-secondary']) ?>
    </p>

</div>