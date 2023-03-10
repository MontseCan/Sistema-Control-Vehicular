<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encargado $model */

$this->title = 'Agregar Encargado';
$this->params['breadcrumbs'][] = ['label' => 'Encargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encargado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeluser' => $modeluser,
    ]) ?>

</div>
