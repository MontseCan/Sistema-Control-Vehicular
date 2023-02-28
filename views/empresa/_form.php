<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Empresa;
use kartik\file\FileInput;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Empresa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <div class="row">

        <div class="col-md-12">
            <?= $form->field($model, 'emp_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'emp_correo', [
                'feedbackIcon' => [
                    'prefix' => 'fas fa-',
                    'default' => 'envelope',
                    'success' => 'check text-success',
                    'error' => 'exclamation-triangle text-danger',
                    'defaultOptions' => ['class' => 'text-primary']
                ]
            ])->textInput(['maxlength' => 255]); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'emp_rfc')->textInput(['maxlength' => true]) ?>
        </div>

        <?php // $form->field($model, 'emp_logo')->textInput(['maxlength' => true]) 
        ?>

        <div class="col-md-6">
            <?= $form->field($model, 'emp_fiscal')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'emp_comercial')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-12">
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

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Regresar', ['index', 'id' => $model->emp_id], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>