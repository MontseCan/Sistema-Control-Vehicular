<?php

use app\models\Servicio;
use app\models\Tipo;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Unidad;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
//use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Servicio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicio-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'ser_nombre')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-6">
            <?= $form->field($model, 'ser_lugar')->textarea(['rows' => 1]) ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($model, 'ser_fecha')->input('date') ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'ser_precio', [
                'addon' => [
                    'prepend' => ['content' => '$', 'options' => ['class' => 'alert-success']],
                    'append' => ['options' => ['style' => 'font-family: Monaco, Consolas, monospace;']],
                ]
            ]); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'ser_proximo')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($model, 'ser_kilometraje')->textInput() ?>
        </div>



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

        <div class="col-md-6">
            <?= $form->field($model, 'ser_tipo')->widget(Select2::classname(), [
                'data' => ['Reparación' => 'Reparación', 'Mantenimiento' => 'Mantenimiento'],
                'options' => ['placeholder' => 'Seleccione el tipo de servicio ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>


        <div class="col-md-6">
            <?= $form->field($model, 'factura')->widget(
                FileInput::classname(),
                [
                    'language' => 'es',
                    'options'       => [
                        'accept' => 'archivo/*',
                    ],
                    'pluginOptions' => [
                        'allowedExtensions'    => ['pdf'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ],
                ]
            ); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'cotizacion')->widget(
                FileInput::classname(),
                [
                    'language' => 'es',
                    'options'       => [
                        'accept' => 'archivo/*',
                    ],
                    'pluginOptions' => [
                        'allowedExtensions'    => ['pdf'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ],
                ]
            ); ?>
        </div>

        <?php // $form->field($model, 'ser_cotizacion')->textInput() 
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->ser_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>