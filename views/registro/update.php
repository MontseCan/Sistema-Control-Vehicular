<?php

use yii\helpers\Html;
use app\models\Unidad;
use app\models\Detalle;
use kartik\builder\Form;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Registro $model */

$this->title = 'Modificar Bitácora: ' .  $model->UnidadNombre;
$this->params['breadcrumbs'][] = ['label' => 'Bitácoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reg_id, 'url' => ['view', 'id' => $model->reg_id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="registro-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'reg_conductor' => ['type' => Form::INPUT_HIDDEN_STATIC,],
                ]
            ]);
            Html::endForm(); ?>
        </div>

        <div class="col-md-6">
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'unidadNombre' => ['type' => Form::INPUT_HIDDEN_STATIC,],
                ]
            ]);
            Html::endForm(); ?>
        </div>

        <div class="col-md-6">
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'reg_salidaFecha' => ['type' => Form::INPUT_HIDDEN_STATIC,],
                ]
            ]);
            Html::endForm(); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'reg_entradaFecha')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy HH:ii P'
                ]
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'detalleFechaS' => ['type' => Form::INPUT_HIDDEN_STATIC,],
                ]
            ]);
            Html::endForm(); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'reg_fkdetalleE')->widget(Select2::classname(), [
                'data' => Detalle::detalleMap(),
                'options' => ['placeholder' => 'Seleccione'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::a('Añadir CheckList', ['/detalle/create/'], ['class' => 'btn btn-warning']) ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->reg_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>