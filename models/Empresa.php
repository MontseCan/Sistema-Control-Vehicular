<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "empresa".
 *
 * @property int $emp_id Id
 * @property string $emp_nombre Nombre
 * @property string $emp_correo Correo electrónico
 * @property string $emp_rfc RFC
 * @property string $emp_logo Logo
 * @property string $emp_fiscal Dirección fiscal
 * @property string $emp_comercial Dirección comercial
 *
 * @property Encargado[] $encargados
 * @property Registro[] $registros
 */
class Empresa extends \yii\db\ActiveRecord
{
    public $imagen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_nombre', 'emp_correo', 'emp_rfc', 'emp_fiscal', 'emp_comercial'], 'required'],
            [['emp_fiscal', 'emp_comercial'], 'string'],
            [['emp_nombre', 'emp_correo'], 'string', 'max' => 100],
            [['emp_rfc'], 'string', 'max' => 13],
            //[['emp_logo'], 'string', 'max' => 255],
            //[['emp_logo'], 'safe'],

            [['imagen'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxFiles' => '1']

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Id',
            'emp_nombre' => 'Nombre',
            'emp_correo' => 'Correo electrónico',
            'emp_rfc' => 'RFC',
            'emp_logo' => 'Logo',
            'emp_fiscal' => 'Dirección fiscal',
            'emp_comercial' => 'Dirección comercial',
            
            'imagen' => 'Logo',
        ];
    }

    /**
     * Gets query for [[Encargados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncargados()
    {
        return $this->hasMany(Encargado::class, ['enc_fkempresa' => 'emp_id']);
    }

    /**
     * Gets query for [[Registros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::class, ['reg_fkempresa' => 'emp_id']);
    }

    public static function empresaMap()
    {
        return ArrayHelper::map(Empresa::find()->all(), 'emp_id', 'emp_nombre');
    }


    

}
