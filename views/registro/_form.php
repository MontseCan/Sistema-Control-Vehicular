<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use app\models\Unidad;
use app\models\Detalle;
use kartik\datetime\DateTimePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Registro $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="registro-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'reg_conductor') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'reg_fkunidad')->widget(Select2::classname(), [
                'data' => Unidad::unidadMap(),
                'options' => ['placeholder' => 'Seleccione una unidad ...', 'id' => 'uni_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        
        <div class="col-md-6">
            <?= $form->field($model, 'reg_salidaFecha')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy HH:ii P'
                ]
            ]);
            ?>
        </div>

     <div class="col-md-6">
            <?php /*$form->field($model, 'reg_entradaFecha')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy HH:ii P'
                ]
            ]);
           */ ?>
        </div>

        
        <div class="col-md-6">
            <?= $form->field($model, 'reg_fkdetalleS')->widget(Select2::classname(), [
                'data' => Detalle::detalleMap(),
                'options' => ['placeholder' => 'Seleccione'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        
      <div class="col-md-6">
            <?php /*$form->field($model, 'reg_fkdetalleE')->widget(Select2::classname(), [
                'data' => Detalle::detalleMap(),
                'options' => ['placeholder' => 'Seleccione'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            */?>
        </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->reg_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>