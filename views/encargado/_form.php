<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Empresa;
use app\models\Encargado;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\password\PasswordInput;
//use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Encargado $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encargado-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <?php // $form->field($model, 'enc_foto')->textInput(['maxlength' => true]) 
        ?>

        <div class="col-md-4">
            <?= $form->field($model, 'enc_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'enc_paterno')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'enc_materno')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?php // $form->field($model, 'enc_telefono')->textInput() 
            ?>

            <?= $form->field($model, 'enc_telefono', [
                'feedbackIcon' => [
                    'prefix' => 'fas fa-',
                    'default' => 'mobile-alt',
                    'success' => 'check-circle',
                    'error' => 'exclamation-circle',
                ]
            ])->widget('yii\widgets\MaskedInput', [
                'mask' => '999-999-9999'
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'enc_fkempresa')->widget(Select2::classname(), [

                'data' => Empresa::empresaMap(),
                'options' => ['placeholder' => 'Seleccione una empresa ...', 'id' => 'emp_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?php //$form->field($modeluser, 'email')->textInput(['maxlength' => 255]) 
            ?>
            <?= $form->field($modeluser, 'email', [
                'feedbackIcon' => [
                    'prefix' => 'fas fa-',
                    'default' => 'envelope',
                    'success' => 'check text-success',
                    'error' => 'exclamation-triangle text-danger',
                    'defaultOptions' => ['class' => 'text-primary']
                ]
            ])->textInput(['maxlength' => 255]); ?>
        </div>

        <div class="col-md-4">
            <?php // $form->field($modeluser, 'username')->textInput(['maxlength' => 50, 'autocomplete' => 'off', 'autofocus' => true]) 
            ?>
            <?= $form->field($modeluser, 'username', [
                'feedbackIcon' => [
                    'prefix' => 'fas fa-',
                    'default' => 'user',
                    'success' => 'user-plus',
                    'error' => 'user-times',
                    'defaultOptions' => ['class' => 'text-warning']
                ]
            ])->textInput(['maxlength' => 50, 'autofocus' => false]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modeluser, 'password')->widget(PasswordInput::classname(), [
                'pluginOptions' => [
                    'verdictTitles' => [
                        0 => 'Muy corta',
                        1 => 'Muy débil',
                        2 => 'Débil',
                        3 => 'Buena',
                        4 => 'Fuerte',
                        5 => 'Muy fuerte'
                    ],
                    'verdictClasses' => [
                        0 => 'text-muted',
                        1 => 'text-danger',
                        2 => 'text-warning',
                        3 => 'text-info',
                        4 => 'text-primary',
                        5 => 'text-success'
                    ],
                ]
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modeluser, 'repeat_password')->widget(PasswordInput::classname(), [
                'pluginOptions' => [
                    'verdictTitles' => [
                        0 => 'Muy corta',
                        1 => 'Muy débil',
                        2 => 'Débil',
                        3 => 'Buena',
                        4 => 'Fuerte',
                        5 => 'Muy fuerte'
                    ],
                    'verdictClasses' => [
                        0 => 'text-muted',
                        1 => 'text-danger',
                        2 => 'text-warning',
                        3 => 'text-info',
                        4 => 'text-primary',
                        5 => 'text-success'
                    ],
                ]
            ]); ?>
        </div>

        <?php // $form->field($model, 'enc_fkempresa')->textInput() 
        ?>

        <?php // $form->field($model, 'enc_fkuser')->textInput() 
        ?>

        <div>
            <?= $form->field($model, 'imagen')->widget(
                FileInput::classname(),
                [
                    'language' => 'es',
                    'options'       => [
                        'accept' => 'imagen/*',
                    ],
                ]
            ); ?>
        </div>
        
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->enc_id], ['class' => 'btn btn-secondary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<!-- on your view layout file HEAD section -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
