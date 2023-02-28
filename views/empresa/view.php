<?php

use yii\helpers\Html;
use kartik\detail\DetailView;


/** @var yii\web\View $this */
/** @var app\models\Empresa $model */

$this->title = $model->emp_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [


            [
                'attribute' => 'emp_logo',
                'format' => 'html',
                'value' => Html::img(yii\helpers\Url::to('@web/' . $model->emp_logo), ['width' => '250px']),
                'hAlign' => 'center',

                'valueColOptions' => ['style' => 'width:25%'],
            ],

            [
                'group' => true,
                'label' => 'SECCIÓN 1: INFORMACIÓN BÁSICA',
                'rowOptions' => ['class' => 'table-danger']
            ],

            [
                'attribute' => 'emp_nombre',
                'valueColOptions' => ['style' => 'width:25%'],
            ],
            
            [
                'columns' => [
                    
                    [
                        'attribute' => 'emp_correo',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'emp_rfc',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                ],
            ],

            [
                'columns' => [
                    [

                        'attribute' => 'emp_fiscal',
                        'valueColOptions' => ['style' => 'width:25%'],
                    ],
                    [
                        'attribute' => 'emp_comercial',
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
            'heading' => '<i class="fa-solid fa-building"></i> Empresa',
            'footer' => false
        ],
    ]);
    ?>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->emp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->emp_id], ['class' => 'btn btn-secondary']) ?>
    </p>

</div>