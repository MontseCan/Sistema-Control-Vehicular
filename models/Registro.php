<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registro".
 *
 * @property int $reg_id Id
 * @property string $reg_entradaFecha Fecha y hora de Entrada
 * @property string|null $reg_salidaFecha Fecha y hora de Salida
 * @property string $reg_conductor Conductor
 * @property int $reg_fkunidad Unidad
 * @property int $reg_fkdetalleE Detalles Entrada
 * @property int $reg_fkdetalleS Detalles Salida
 *
 * @property Detalle $regFkdetalleE
 * @property Detalle $regFkdetalleS
 * @property Unidad $regFkunidad
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_salidaFecha', 'reg_conductor', 'reg_fkunidad', 'reg_fkdetalleS'], 'required'],
            [['reg_fkunidad', 'reg_fkdetalleE', 'reg_fkdetalleS'], 'integer'],
            //[['reg_salidaFecha'], 'string', 'max' => 255],
            [['reg_conductor'], 'string', 'max' => 100],
            [['reg_entradaFecha', 'reg_salidaFecha'], 'string', 'max' => 50],
            [['reg_fkunidad'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::class, 'targetAttribute' => ['reg_fkunidad' => 'uni_id']],
            [['reg_fkdetalleE'], 'exist', 'skipOnError' => true, 'targetClass' => Detalle::class, 'targetAttribute' => ['reg_fkdetalleE' => 'det_id']],
            [['reg_fkdetalleS'], 'exist', 'skipOnError' => true, 'targetClass' => Detalle::class, 'targetAttribute' => ['reg_fkdetalleS' => 'det_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Id',
            //'reg_entradaFecha' => 'Fecha y hora de Entrada',
            //'reg_salidaFecha' => 'Fecha y hora de Salida',
            'reg_entradaFecha' => 'Entrada',
            'reg_salidaFecha' => 'Salida',
            'reg_conductor' => 'Conductor',
            'reg_fkunidad' => 'Unidad',
            'unidadNombre' => 'Número de Serie',
            'unidadModelo' => 'Modelo',
            //'reg_fkdetalleE' => 'Detalles Entrada',
            //'reg_fkdetalleS' => 'Detalles Salida',
            'reg_fkdetalleE' => 'Check List - E',
            'reg_fkdetalleS' => 'Check List - S',
            'detalleFechaE' => 'Check List Entrada',
            'detalleFechaS' => 'Check List Salida',
        ];
    }

    /**
     * Gets query for [[RegFkdetalleE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegFkdetalleE()
    {
        return $this->hasOne(Detalle::class, ['det_id' => 'reg_fkdetalleE']);
    }

    /**
     * Gets query for [[RegFkdetalleS]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegFkdetalleS()
    {
        return $this->hasOne(Detalle::class, ['det_id' => 'reg_fkdetalleS']);
    }

    /**
     * Gets query for [[RegFkunidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegFkunidad()
    {
        return $this->hasOne(Unidad::class, ['uni_id' => 'reg_fkunidad']);
    }

    public function getUnidadNombre()
    {
        return $this->regFkunidad->uni_serie;
    }

    public function getUnidadModelo()
    {
        return $this->regFkunidad->uni_modelo;
    }

    public function getDetalleFechaE()
    {
        return $this->regFkdetalleE->det_fecha;
    }

    public function getDetalleFechaS()
    {
        return $this->regFkdetalleS->det_fecha;
    }
}
