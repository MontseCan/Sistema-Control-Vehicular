<?php

use yii\helpers\Html;
use app\models\Empresa;
use kartik\select2\Select2;

use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EncargadoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encargado-search">

<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]);
    ?>

    <div class="row">

    <?php //  $form->field($model, 'enc_id') 
    ?>

    <?php // $form->field($model, 'enc_foto') 
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

    <?php // echo $form->field($model, 'enc_fkuser') 
    ?>
</div>
    <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>