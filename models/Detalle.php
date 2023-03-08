<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "detalle".
 *
 * @property int $det_id Id
 * @property string|null $det_comentario Comentarios 
 * @property string $det_asiento Asientos
 * @property string $det_cinturon Cinturones de seguridad
 * @property string $det_claxon Claxon
 * @property string $det_tablero Tablero estereo
 * @property string $det_clima Sistema de aire acondicionado
 * @property string $det_antena Antena
 * @property string $det_encendedor Encendedor y cenicero
 * @property string $det_tapete Tapetes
 * @property string $det_carroceria Carrocería
 * @property string $det_trasera Facia trasera
 * @property string $det_delantera Facia delantera
 * @property string $det_tapon Tapón de combustible
 * @property string $det_parabrisa Parabrisas 
 * @property string $det_limparabrisa Limpia parabrisas
 * @property string $det_aceite Nivel de aceite de motor
 * @property string $det_rines Rines
 * @property string $det_retrovisores Espejos retrovisores
 * @property string $det_liqfreno Nivel de líquido de freno
 * @property string $det_anticongelante Nivel de anticongelante
 * @property string $det_hidraulico Nivel de líquido hidráulico
 * @property string $det_combustible Combustible
 * @property string $det_luces Luces Altas, bajas y niebla
 * @property string $det_lucDelantera Luces Cuartos delanteros, traseros y laterales
 * @property string $det_lucDireccional Luces Direccionales e intermitentes
 * @property string $det_reversa Frenos y Reversa
 * @property string $det_lucInterior Luces Interiores
 * @property string $det_encendido Encendido de motor	
 
 * @property string $det_velocidad Sistema de avance y velocidades
 * @property string $det_freno Sistema de frenos
 * @property string $det_mano Freno de mano
 * @property string $det_sensor Sensor de reversa
 * @property string $det_fecha Fecha
 * @property int $det_fkunidad Unidad
 *
 * @property Unidad $detFkunidad
 * @property Registro[] $registros
 * @property Registro[] $registros0
 */
class Detalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['det_comentario'], 'string'],
            [['det_asiento', 'det_cinturon', 'det_claxon', 'det_tablero', 'det_clima', 'det_antena', 'det_encendedor', 'det_tapete', 'det_carroceria', 'det_trasera', 'det_delantera', 'det_tapon', 'det_parabrisa', 'det_limparabrisa', 'det_aceite', 'det_rines', 'det_retrovisores', 'det_liqfreno', 'det_anticongelante', 'det_hidraulico', 'det_combustible', 'det_luces', 'det_lucDelantera', 'det_lucDireccional', 'det_reversa', 'det_lucInterior', 'det_encendido', 'det_velocidad', 'det_freno', 'det_mano', 'det_sensor', 'det_fecha', 'det_fkunidad'], 'required'],
            [['det_fecha'],  'string', 'max' => 20],
            [['det_fkunidad'], 'integer'],
            [['det_asiento', 'det_cinturon', 'det_claxon', 'det_tablero', 'det_clima', 'det_antena', 'det_encendedor', 'det_tapete', 'det_carroceria', 'det_trasera', 'det_delantera', 'det_tapon', 'det_parabrisa', 'det_limparabrisa', 'det_aceite', 'det_rines', 'det_retrovisores', 'det_liqfreno', 'det_anticongelante', 'det_hidraulico', 'det_combustible', 'det_luces', 'det_lucDelantera', 'det_lucDireccional', 'det_reversa', 'det_lucInterior', 'det_encendido', 'det_velocidad', 'det_freno', 'det_mano', 'det_sensor'], 'string', 'max' => 15],
            [['det_fkunidad'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::class, 'targetAttribute' => ['det_fkunidad' => 'uni_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'det_id' => 'Id',
            'det_comentario' => 'Comentarios ',
            'det_asiento' => 'Asientos',
            'det_cinturon' => 'Cinturones de seguridad',
            'det_claxon' => 'Claxon',
            'det_tablero' => 'Tablero estereo',
            'det_clima' => 'Sistema de aire acondicionado',
            'det_antena' => 'Antena',
            'det_encendedor' => 'Encendedor y cenicero',
            'det_tapete' => 'Tapetes',
            'det_carroceria' => 'Carrocería',
            'det_trasera' => 'Facia trasera',
            'det_delantera' => 'Facia delantera',
            'det_tapon' => 'Tapón de combustible',
            'det_parabrisa' => 'Parabrisas ',
            'det_limparabrisa' => 'Limpia parabrisas',
            'det_aceite' => 'Nivel de aceite de motor',
            'det_rines' => 'Rines',
            'det_retrovisores' => 'Espejos retrovisores',
            'det_liqfreno' => 'Nivel de líquido de freno',
            'det_anticongelante' => 'Nivel de anticongelante',
            'det_hidraulico' => 'Nivel de líquido hidráulico',
            'det_combustible' => 'Combustible',
            'det_luces' => 'Altas, bajas y niebla',
            'det_lucDelantera' => 'Cuartos delanteros y traseros',
            'det_lucDireccional' => 'Direccionales e intermitentes',
            'det_reversa' => 'Frenos y Reversa',
            'det_lucInterior' => 'Interiores',
            'det_encendido' => 'Encendido de motor',
            'det_velocidad' => 'Sistema de avance y velocidades',
            'det_freno' => 'Sistema de frenos',
            'det_mano' => 'Freno de mano',
            'det_sensor' => 'Sensor de reversa',
            'det_fecha' => 'Fecha',
            'det_fkunidad' => 'Unidad',
            'unidadNombre' => 'Unidad',
        ];
    }

    /**
     * Gets query for [[DetFkunidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetFkunidad()
    {
        return $this->hasOne(Unidad::class, ['uni_id' => 'det_fkunidad']);
    }

    /**
     * Gets query for [[Registros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::class, ['reg_fkdetalleE' => 'det_id']);
    }

    /**
     * Gets query for [[Registros0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros0()
    {
        return $this->hasMany(Registro::class, ['reg_fkdetalleS' => 'det_id']);
    }

    
    public function getUnidadNombre()
    {
        return $this->detFkunidad->uni_serie;
    }

    public static function detalleMap()
    {
        return 
        ArrayHelper::map(Detalle::find('reg_fkUnidad' == 'det_fkUnidad')->all(), 'det_id', 'det_fecha', 'unidadNombre');
    }


}
