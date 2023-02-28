<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EncargadoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encargado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enc_id') ?>

    <?= $form->field($model, 'enc_foto') ?>

    <?= $form->field($model, 'enc_nombre') ?>

    <?= $form->field($model, 'enc_paterno') ?>

    <?= $form->field($model, 'enc_materno') ?>

    <?php // echo $form->field($model, 'enc_telefono') ?>

    <?php // echo $form->field($model, 'enc_fkempresa') ?>

    <?php // echo $form->field($model, 'enc_fkuser') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
