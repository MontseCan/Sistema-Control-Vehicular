<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Empresa $model */

$this->title = 'Modificar Empresa: ' . $model->emp_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_id, 'url' => ['view', 'id' => $model->emp_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
