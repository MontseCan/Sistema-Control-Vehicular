<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use app\models\Unidad;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\DetalleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalle-search">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'det_fkunidad')->widget(Select2::classname(), [
                'data' => Unidad::unidadMap(),
                'options' => ['placeholder' => 'Seleccione una unidad ...', 'id' => 'uni_id'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'det_fecha')->input('date') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'det_id') 
    ?>

    <?php // echo $form->field($model, 'det_comentario') 
    ?>

    <?php // echo $form->field($model, 'det_asiento') 
    ?>

    <?php // echo $form->field($model, 'det_cinturon') 
    ?>

    <?php // echo $form->field($model, 'det_claxon') 
    ?>

    <?php // echo $form->field($model, 'det_tablero') 
    ?>

    <?php // echo $form->field($model, 'det_clima') 
    ?>

    <?php // echo $form->field($model, 'det_antena') 
    ?>

    <?php // echo $form->field($model, 'det_encendedor') 
    ?>

    <?php // echo $form->field($model, 'det_tapete') 
    ?>

    <?php // echo $form->field($model, 'det_carroceria') 
    ?>

    <?php // echo $form->field($model, 'det_trasera') 
    ?>

    <?php // echo $form->field($model, 'det_delantera') 
    ?>

    <?php // echo $form->field($model, 'det_tapon') 
    ?>

    <?php // echo $form->field($model, 'det_parabrisa') 
    ?>

    <?php // echo $form->field($model, 'det_limparabrisa') 
    ?>

    <?php // echo $form->field($model, 'det_aceite') 
    ?>

    <?php // echo $form->field($model, 'det_rines') 
    ?>

    <?php // echo $form->field($model, 'det_retrovisores') 
    ?>

    <?php // echo $form->field($model, 'det_liqfreno') 
    ?>

    <?php // echo $form->field($model, 'det_anticongelante') 
    ?>

    <?php // echo $form->field($model, 'det_hidraulico') 
    ?>

    <?php // echo $form->field($model, 'det_combustible') 
    ?>

    <?php // echo $form->field($model, 'det_luces') 
    ?>

    <?php // echo $form->field($model, 'det_lucDelantera') 
    ?>

    <?php // echo $form->field($model, 'det_lucDireccional') 
    ?>

    <?php // echo $form->field($model, 'det_reversa') 
    ?>

    <?php // echo $form->field($model, 'det_lucInterior') 
    ?>

    <?php // echo $form->field($model, 'det_encendido') 
    ?>

    <?php // echo $form->field($model, 'det_velocidad') 
    ?>

    <?php // echo $form->field($model, 'det_freno') 
    ?>

    <?php // echo $form->field($model, 'det_mano') 
    ?>

    <?php // echo $form->field($model, 'det_sensor') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>