<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property int $ser_id Id
 * @property string $ser_nombre Nombre
 * @property string $ser_fecha Fecha
 * @property string $ser_lugar Lugar
 * @property int $ser_precio Precio
 * @property int $ser_kilometraje Kilometraje
 * @property string|null $ser_proximo Próximo servicio
 * @property string $ser_tipo Tipo de servicio
 * @property string|null $ser_cotizacion Cotización
 * @property string|null $ser_factura Factura
 * @property int $ser_fkunidad Unidad
 *
 * @property Unidad $serFkunidad
 */
class Servicio extends \yii\db\ActiveRecord
{
    
    public $factura;
    public $cotizacion;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ser_nombre', 'ser_fecha', 'ser_lugar', 'ser_precio', 'ser_kilometraje', 'ser_tipo', 'ser_fkunidad'], 'required'],
            [['ser_fecha'], 'safe'],
            [['ser_lugar'], 'string'],
            [['ser_kilometraje', 'ser_fkunidad'], 'integer'],
            [['ser_precio'], 'number'],
            [['ser_nombre', 'ser_proximo'], 'string', 'max' => 50],
            [['ser_tipo'], 'string', 'max' => 20],
            [['ser_cotizacion', 'ser_factura'], 'string', 'max' => 100],
            [['ser_fkunidad'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::class, 'targetAttribute' => ['ser_fkunidad' => 'uni_id']],
            

            
            [['cotizacion', 'factura'], 'file', 'extensions' => 'pdf', 'maxFiles' => '1']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ser_id' => 'Id',
            'ser_nombre' => 'Servicio',
            'ser_fecha' => 'Fecha',
            'ser_lugar' => 'Lugar',
            'ser_precio' => 'Precio',
            'ser_kilometraje' => 'Kilometraje',
            'ser_proximo' => 'Próximo servicio',
            'ser_tipo' => 'Tipo de servicio',
            'ser_cotizacion' => 'Cotización',
            'ser_factura' => 'Factura',
            'ser_fkunidad' => 'Unidad',
            'unidadNombre' => 'Unidad',

            
            'cotizacion' => 'Cotización',
            'factura' => 'Factura',
        ];
    }

    /**
     * Gets query for [[SerFkunidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSerFkunidad()
    {
        return $this->hasOne(Unidad::class, ['uni_id' => 'ser_fkunidad']);
    }

    public function getUnidadNombre()
    {
        return $this->serFkunidad->uni_serie;
    }


    
}
