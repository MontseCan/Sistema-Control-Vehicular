<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encargado $model */

$this->title = 'Modificar Encargado: ' . $model->enc_nombre. ' '. $model->enc_paterno.' '.$model->enc_materno;
$this->params['breadcrumbs'][] = ['label' => 'Encargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enc_id, 'url' => ['view', 'id' => $model->enc_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="encargado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeluser' => $modeluser,
    ]) ?>

</div>
