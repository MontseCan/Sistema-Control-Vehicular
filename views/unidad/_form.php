<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Unidad;
//use yii\widgets\ActiveForm;
use app\models\Empresa;
use kartik\builder\Form;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\color\ColorInput;

/** @var yii\web\View $this */
/** @var app\models\Unidad $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidad-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <div class="row">

        <div class="col-md-3">
            <?= $form->field($model, 'uni_modelo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'uni_marca')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'uni_placa')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'uni_anio')->input('number', ['min' => 1990, 'max' => 3000]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'uni_motor')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'uni_color')->widget(ColorInput::classname(), [
                'name' => 'color_33',
                'showDefaultPalette' => false,
                'options' => ['placeholder' => 'Selecciona un color ...'],
                'pluginOptions' => [
                    'language' => 'es',
                    'showInput' => false,
                    'showInitial' => false,
                    'showPalette' => true,
                    'showPaletteOnly' => true,
                    'showSelectionPalette' => false,
                    'showAlpha' => false,
                    'allowEmpty' => false,
                    'preferredFormat' => 'name',
                    'palette' => [
                        [
                            "white", "black", "grey", "silver", "gold", "brown",
                        ],
                        [
                            "red", "orange", "yellow", "indigo", "maroon", "pink"
                        ],
                        [
                            "blue", "green", "violet", "cyan", "magenta", "purple",
                        ],
                    ],
                ]
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'uni_fkempresa')->widget(Select2::classname(), [
                'data' => Empresa::empresaMap(),
                'options' => ['placeholder' => 'Seleccione una empresa ...', 'id' => 'emp_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'uni_serie')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'uni_tenencia')->input('number', ['min' => 2000, 'max' => 3000]) ?>
        </div>



        <div class="col-md-6">
            <?= $form->field($model, 'imagen')->widget(
                FileInput::classname(),
                [
                    'language' => 'es',
                    'options'       => [
                        'accept' => 'archivo/*',
                    ],
                    'pluginOptions' => [
                        'allowedExtensions'    => ['png, jpg, jppeg'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ],
                ]
            ); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'archivo')->widget(
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
            <?= $form->field($model, 'uni_descripcion')->textarea(['rows' => 3]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'uni_comentario')->textarea(['rows' => 3]) ?>
        </div>

        <div class="col-md-12">
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 2,
                'attributes' => [
                    'uni_extintor' => [
                        'items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'],   'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'uni_cruz' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'uni_gato' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'uni_manual' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'uni_cable' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'uni_rines' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->uni_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>