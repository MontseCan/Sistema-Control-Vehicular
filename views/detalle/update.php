<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detalle $model */

$this->title = 'Modificar Checklist: ' . $model->det_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->det_id, 'url' => ['view', 'id' => $model->det_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
