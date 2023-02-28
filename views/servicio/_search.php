<?php

use app\models\Tipo;
use yii\helpers\Html;
use app\models\Unidad;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ServicioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?php //$form->field($model, 'ser_id') 
    ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'ser_nombre') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'ser_lugar') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'ser_fecha')->input('date') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'ser_tipo')->widget(Select2::classname(), [
                'data' => [1 => 'Reparación', 2 => 'Mantenimiento'],
                'options' => ['placeholder' => 'Seleccione el tipo de servicio ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <?php // $form->field($model, 'ser_precio') 
        ?>

        <?php // echo $form->field($model, 'ser_kilometraje') 
        ?>

        <?php // echo $form->field($model, 'ser_proximo') 
        ?>

        <div class="col-md-3">
            <?= $form->field($model, 'ser_fkunidad')->widget(Select2::classname(), [
                'data' => Unidad::unidadMap(),
                'options' => ['placeholder' => 'Seleccione una unidad ...', 'id' => 'uni_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>