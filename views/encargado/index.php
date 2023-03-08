<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Encargado;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\EncargadoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = 'Encargados';
$this->params['breadcrumbs'][] = 'Encargados';
?>
<div class="encargado-index">

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
            'header' => 'N°',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],

        [
            'attribute' => 'enc_foto',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::img(yii\helpers\Url::to('/uploads/perfil/' . $model->enc_foto), ['width' => '100px']);
            },

            //'htmlOptions' => array('style' => 'width: 60px; height: 60px'),
        ],

        [
            'attribute' => 'enc_nombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],

        [
            'attribute' => 'enc_paterno',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'enc_materno',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'enc_telefono',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'empresaNombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete}'),
            'urlCreator' => function ($action, Encargado $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->enc_id]);
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
            'xls' => [],
            'pdf' => [],
        ],
        'toolbar' => [
            [
                'content' =>
                Html::a('<i class="fas fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-success',
                    'title' => 'Agregar Encargado',
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
            'heading' => '<i class="fa-solid fa-car-side"></i> Encargados',
            'footer' => false
        ],
    ]);
    ?>


</div>