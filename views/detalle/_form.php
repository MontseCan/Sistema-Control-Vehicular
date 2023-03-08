<?php

use yii\helpers\Html;
use app\models\Unidad;
use kartik\builder\Form;
use kartik\form\ActiveForm;
//use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Detalle $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalle-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">

        <div class="col-sm">

            <?= $form->field($model, 'det_fkunidad')->widget(Select2::classname(), [
                'data' => Unidad::unidadMap(),
                'options' => ['placeholder' => 'Seleccione una unidad ...', 'id' => 'uni_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?= $form->field($model, 'det_fecha')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy HH:ii P',
                    'value' => true,
                ]
            ]);
            ?>

            <?= $form->field($model, 'det_comentario')->textarea(['rows' => 8]) ?>

        </div>

        <div class="col-sm">
            <h2>Niveles</h2>
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'det_aceite' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'Requiere cambio' => 'Requiere cambio'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_liqfreno' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'Requiere cambio' => 'Requiere cambio'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_anticongelante' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'Requiere cambio' => 'Requiere cambio'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_hidraulico' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'Requiere cambio' => 'Requiere cambio'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_combustible' => ['items' => ['Lleno' => 'Lleno', '1/2' => '1/2', '1/4' => '1/4', 'Reserva' => 'Reserva', 'Vacio' => 'Vacio'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>
        </div>


    </div>


    <div class="row">
        <div class="col-sm">
            <h2>Interior</h2>
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'det_asiento' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_cinturon' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_claxon' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_tablero' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_clima' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_antena' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_encendedor' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_tapete' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>

        </div>

        <?php // $form->field($model, 'det_asiento')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_cinturon')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_claxon')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_tablero')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_clima')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_antena')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_encendedor')->textInput(['maxlength' => true]) 
        ?>
        <?php // $form->field($model, 'det_tapete')->textInput(['maxlength' => true]) 
        ?>

        <div class="col-sm">
            <h2>Exterior</h2>
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'det_carroceria' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_trasera' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_delantera' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_tapon' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_parabrisa' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_limparabrisa' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_rines' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_retrovisores' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>

        </div>
        <?php //  $form->field($model, 'det_carroceria')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_trasera')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_delantera')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_tapon')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_parabrisa')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_limparabrisa')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_rines')->textInput(['maxlength' => true]) 
        ?>
        <?php //  $form->field($model, 'det_retrovisores')->textInput(['maxlength' => true]) 
        ?>
    </div>

    <div class="row">
        <div class="col-sm">
            <h2>Luces</h2>
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'det_luces' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_lucDelantera' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_reversa' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_lucInterior' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_lucDireccional' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>
        </div>

        <?php //  $form->field($model, 'det_luces')->textInput(['maxlength' => true]) 
        ?>

        <?php //  $form->field($model, 'det_lucDelantera')->textInput(['maxlength' => true]) 
        ?>

        <?php //  $form->field($model, 'det_lucDireccional')->textInput(['maxlength' => true]) 
        ?>

        <?php //  $form->field($model, 'det_reversa')->textInput(['maxlength' => true]) 
        ?>

        <?php //  $form->field($model, 'det_lucInterior')->textInput(['maxlength' => true]) 
        ?>

        <div class="col-sm">
            <h2>Funcionamiento Básico</h2>
            <?= Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 1,
                'attributes' => [
                    'det_encendido' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_velocidad' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_freno' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_mano' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                    'det_sensor' => ['items' => ['Bueno' => 'Bueno', 'Malo' => 'Malo', 'No aplica' => 'No aplica'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                ]
            ]);
            Html::endForm(); ?>
        </div>
    </div>
    <?php //   $form->field($model, 'det_encendido')->textInput(['maxlength' => true]) 
    ?>
    <?php //   $form->field($model, 'det_velocidad')->textInput(['maxlength' => true]) 
    ?>
    <?php //   $form->field($model, 'det_freno')->textInput(['maxlength' => true]) 
    ?>
    <?php //   $form->field($model, 'det_mano')->textInput(['maxlength' => true]) 
    ?>
    <?php //   $form->field($model, 'det_sensor')->textInput(['maxlength' => true]) 
    ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Regresar', ['index', 'id' => $model->det_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>