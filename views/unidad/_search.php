<?php

use yii\helpers\Html;
use app\models\Empresa;
use kartik\select2\Select2;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;

/** @var yii\web\View $this */
/** @var app\models\UnidadSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
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

        <div class="col-md-6">
            <?= $form->field($model, 'uni_serie')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'uni_fkempresa')->widget(Select2::classname(), [
                'data' => Empresa::empresaMap(),
                'options' => ['placeholder' => 'Seleccione una empresa ...', 'id' => 'emp_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'uni_tenencia')->input('number', ['min' => 2000, 'max' => 3000]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'uni_motor')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-3">
            <?= $form->field($model, 'uni_color')->widget(ColorInput::classname(), [
                'name' => 'color_33',
                'value' => 'red',
                'showDefaultPalette' => false,
                'options' => ['placeholder' => 'Selecciona un color ...'],
                'pluginOptions' => [
                    'showInput' => true,
                    'showInitial' => true,
                    'showPalette' => true,
                    'showPaletteOnly' => true,
                    'showSelectionPalette' => true,
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
                    ]
                ]
            ]);
            ?>
        </div>

        

        <?php // echo $form->field($model, 'uni_placa') 
        ?>

        <?php // echo $form->field($model, 'uni_tarjeta') 
        ?>

        <?php // echo $form->field($model, 'uni_comentario') 
        ?>

        <?php // echo $form->field($model, 'uni_extintor') 
        ?>

        <?php // echo $form->field($model, 'uni_cruz') 
        ?>

        <?php // echo $form->field($model, 'uni_gato') 
        ?>

        <?php // echo $form->field($model, 'uni_manual') 
        ?>

        <?php // echo $form->field($model, 'uni_cable') 
        ?>

        <?php // echo $form->field($model, 'uni_rines') 
        ?>

        <?php // echo $form->field($model, 'uni_fkempresa') 
        ?>

        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
        </div>

        <?php ActiveForm::end(); ?> 

    </div>