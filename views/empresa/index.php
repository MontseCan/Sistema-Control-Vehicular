<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Empresa;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;

/** @var yii\web\View $this */
/** @var app\models\EmpresaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Filtrado por:</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]);  ?>

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
            'attribute' => 'emp_logo',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::img(yii\helpers\Url::to('@web/' . $model->emp_logo), ['width' => '100px']);
            }
        ],

        [
            'attribute' => 'emp_nombre',
            'vAlign' => 'middle',
            'hAlign' => 'center'

        ],

        [
            'attribute' => 'emp_correo',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'emp_rfc',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'emp_fiscal',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],

        [
            'attribute' => 'emp_comercial',
            'vAlign' => 'middle',
            'hAlign' => 'center'
        ],
        [
            'class' => 'kartik\grid\ActionColumn', 'template' => User::hasRole(['controlarias'], false) ? '{view}' : (User::hasRole(['administradores'], false) ? '{view} {update}' : '{view} {update} {delete}'),
            'urlCreator' => function ($action, Empresa $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->emp_id]);
            }
        ]
    ];
    ?>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'responsive' => true,
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
            'heading' => '<i class="fa-solid fa-building"></i> Empresa',
            'footer' => false
        ],
    ]);
    ?>


</div>