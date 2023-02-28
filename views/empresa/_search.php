<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmpresaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-search">
    <?php //$form->field($model, 'emp_id') 
    ?>

    <?php //$form->field($model, 'emp_nombre') 
    ?>

    <?php // $form->field($model, 'emp_correo') 
    ?>

    <?php // $form->field($model, 'emp_rfc') 
    ?>

    <?php // $form->field($model, 'emp_logo') 
    ?>

    <?php // $form->field($model, 'emp_fiscal') 
    ?>

    <?php //$form->field($model, 'emp_comercial') 
    ?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <div class="row">

        <div class="col-md-6">
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

        <div class="col-md-8">
            <?= $form->field($model, 'emp_fiscal')->textInput(['maxlength' => true])  ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'emp_rfc')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-8">
            <?= $form->field($model, 'emp_comercial')->textInput(['maxlength' => true]) ?>
        </div>


        <?php // $form->field($model, 'emp_logo')->textInput(['maxlength' => true]) 
        ?>

        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>