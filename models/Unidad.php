<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unidad".
 *
 * @property int $uni_id Id
 * @property string $uni_foto Fotos 
 * @property string $uni_descripcion Descripción
 * @property string $uni_modelo Modelo
 * @property string $uni_marca Marca
 * @property string $uni_serie Número de serie del vehículo
 * @property string|null $uni_motor Número de serie del motor
 * @property string $uni_anio Año
 * @property string $uni_color Color
 * @property string $uni_placa Placas
 * @property string $uni_tarjeta Tarjeta de circulación
 * @property string|null $uni_comentario Comentarios adicionales
 * @property string $uni_extintor Extintor
 * @property string $uni_cruz Cruz para birlos
 * @property string $uni_gato Gato
 * @property string $uni_manual Manual de usuario
 * @property string $uni_cable Cable pasa corriente
 * @property string $uni_rines Rines
 * @property int $uni_fkempresa Empresa
 *
 * @property Detalle[] $detalles
 * @property Registro[] $registros
 * @property Servicio[] $servicios
 * @property Empresa $uniFkempresa
 */
class Unidad extends \yii\db\ActiveRecord
{
    public $archivo;
    public $imagen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uni_descripcion', 'uni_modelo', 'uni_marca', 'uni_serie', 'uni_tenencia', 'uni_anio', 'uni_color', 'uni_placa', 'uni_extintor', 'uni_cruz', 'uni_gato', 'uni_manual', 'uni_cable', 'uni_rines', 'uni_fkempresa'], 'required'],
            [['uni_descripcion', 'uni_comentario'], 'string'],
            [['uni_anio', 'uni_tenencia'], 'safe'],
            [['uni_fkempresa'], 'integer'],
            [['uni_modelo', 'uni_marca'], 'string', 'max' => 50],
            [['uni_foto', 'uni_tarjeta'], 'string', 'max' => 100],

            [['imagen'], 'file', 'extensions' => 'jpg,png, jpeg'],
            [['archivo'], 'file', 'extensions' => 'pdf'],

            [['uni_serie', 'uni_motor'], 'string', 'max' => 17],
            [['uni_color'], 'string', 'max' => 20],
            [['uni_placa', 'uni_extintor', 'uni_cruz', 'uni_gato', 'uni_manual', 'uni_cable', 'uni_rines'], 'string', 'max' => 10],
            [['uni_fkempresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['uni_fkempresa' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uni_id' => 'Id',
            'uni_foto' => 'Fotos ',
            'imagen' => 'Fotos ',
            'uni_descripcion' => 'Descripción',
            'uni_modelo' => 'Modelo',
            'uni_marca' => 'Marca',
            'uni_serie' => 'NS Vehículo',
            'uni_motor' => 'NS Motor',
            'uni_anio' => 'Año',
            'uni_color' => 'Color',
            'uni_placa' => 'Placas',
            'uni_tarjeta' => 'Tarjeta de circulación',
            'uni_tenencia' => 'Año de tenencia',
            'archivo' => 'Tarjeta de circulación',
            'uni_comentario' => 'Comentarios adicionales',
            'uni_extintor' => 'Extintor',
            'uni_cruz' => 'Cruz para birlos',
            'uni_gato' => 'Gato',
            'uni_manual' => 'Manual de usuario',
            'uni_cable' => 'Cable pasa corriente',
            'uni_rines' => 'Rines',
            'uni_fkempresa' => 'Empresa',
            'empresaNombre' => 'Empresa',
        ];
    }

    /**
     * Gets query for [[Detalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalles()
    {
        return $this->hasMany(Detalle::class, ['det_fkunidad' => 'uni_id']);
    }

    /**
     * Gets query for [[Registros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::class, ['reg_fkunidad' => 'uni_id']);
    }

    /**
     * Gets query for [[Servicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicios()
    {
        return $this->hasMany(Servicio::class, ['ser_fkunidad' => 'uni_id']);
    }

    /**
     * Gets query for [[UniFkempresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUniFkempresa()
    {
        return $this->hasOne(Empresa::class, ['emp_id' => 'uni_fkempresa']);
    }

    public static function unidadMap()
    {
        return ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_serie' , 'uni_modelo');
    }

    public static function unidadModeloMap()
    {
        return ArrayHelper::map(Unidad::find()->all(), 'uni_id', 'uni_modelo');
    }

    public function getEmpresaNombre()
    {
        return $this->uniFkempresa->emp_nombre;
    }
}
