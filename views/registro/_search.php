<?php

use yii\helpers\Html;
use app\models\Unidad;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\RegistroSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="registro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <div class="row">

        <div class="col-md-4">
            <?= $form->field($model, 'reg_fkunidad')->widget(Select2::classname(), [
                'data' => Unidad::unidadMap(),
                'options' => ['placeholder' => 'Seleccione una unidad ...', 'id' => 'uni_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'reg_entradaFecha')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy HH:ii P'
                ]
            ]);
            ?>
        </div>

        <div class="col-md-4">
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
            <?= $form->field($model, 'reg_conductor') ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>