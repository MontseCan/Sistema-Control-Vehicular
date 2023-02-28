<?php

namespace app\models;

use Yii;
use app\models\Empresa;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "encargado".
 *
 * @property int $enc_id Id
 * @property string|null $enc_foto Foto
 * @property string $enc_nombre Nombre
 * @property string $enc_paterno Apellido Paterno
 * @property string $enc_materno Apellido Materno
 * @property int $enc_telefono Teléfono
 * @property int $enc_fkempresa Empresa
 * @property int $enc_fkuser Usuarios
 *
 * @property Empresa $encFkempresa
 * @property User $encFkuser
 */
class Encargado extends \yii\db\ActiveRecord
{

    public $imagen;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encargado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enc_nombre', 'enc_paterno', 'enc_materno', 'enc_telefono', 'enc_fkempresa', 'enc_fkuser'], 'required'],
            [['enc_fkempresa', 'enc_fkuser'], 'integer'],
            [['enc_telefono','enc_foto', 'enc_nombre', 'enc_paterno', 'enc_materno'], 'string', 'max' => 50],
            [['enc_fkempresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['enc_fkempresa' => 'emp_id']],
            [['enc_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['enc_fkuser' => 'id']],


            [['imagen'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxFiles' => '1']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enc_id' => 'Id',
            'enc_foto' => 'Foto',
            'enc_nombre' => 'Nombre',
            'enc_paterno' => 'Apellido Paterno',
            'enc_materno' => 'Apellido Materno',
            'enc_telefono' => 'Teléfono',
            'enc_fkempresa' => 'Empresa',
            'enc_fkuser' => 'Usuarios',
            'imagen' => 'Foto',
            'empresaNombre' => 'Empresa',
        ];
    }

    /**
     * Gets query for [[EncFkempresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncFkempresa()
    {
        return $this->hasOne(Empresa::class, ['emp_id' => 'enc_fkempresa']);
    }

    /**
     * Gets query for [[EncFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncFkuser()
    {
        return $this->hasOne(User::class, ['id' => 'enc_fkuser']);
    }

    public function getempresaNombre()
    {
        return $this->encFkempresa->emp_nombre;
    }

    //Datos para Info Usuario

    public static function getNombre()
    {  
        $nombre = 'Sin Nombre';
        $encargado = Encargado::find()->where(['enc_fkuser' => Yii::$app->user->identity->id])->one();
        if(isset($encargado)){
            $nombre = [$encargado->enc_nombre.' '.$encargado->enc_paterno.' '.$encargado->enc_materno];
        }
        return $nombre;
    }
    public static function getTelefono()
    {
        $telefono = 'Sin teléfono';
        $encargado = Encargado::find()->where(['enc_fkuser' => Yii::$app->user->identity->id])->one();
        if(isset($encargado)){
            $telefono = $encargado->_telefono;
        }
        return $telefono;
    }

    public static function getFoto()
    {
        $foto = '/web/uploads/perfil/perfil.png';  
        $encargado = Encargado::find()->where(['enc_fkuser' => Yii::$app->user->identity->id])->one();
        if(isset($encargado)){
            $imagen = 'web/uploads/perfil/'.$encargado->enc_id.'/'.$encargado->enc_foto;
            if(file_exists($imagen)){
                $foto = '/'.$imagen;
            }
        }
        return $foto;
    }

    public static function getId()
    {
        /* return $this->conFkempresa->emp_nombre;  */
        $empresa = 'Sin empresa';
        $encargado = Encargado::find()->where(['enc_fkuser' => Yii::$app->user->identity->id])->one();
        if(isset($encargado)){
            $empresa = $encargado->enc_id/* ->emp_nombre */;
        }
        return $empresa;
    }

    
}
