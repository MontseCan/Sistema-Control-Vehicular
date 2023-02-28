<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Unidad $model */

$this->title = 'Modificar Unidad: ' . $model->uni_serie;
$this->params['breadcrumbs'][] = ['label' => 'Unidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uni_serie, 'url' => ['view', 'id' => $model->uni_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="unidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
