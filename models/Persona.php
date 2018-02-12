<?php

namespace app\models;

use Yii;

/**
 * Esta es el modelo de clase para la tabla "persona".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $correo
 * @property int $id_profesion
 * @property int $id_municipio
 * @property string $estado
 *
 * @property Municipio $municipio
 * @property Profesion $profesion
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    /**
     * El estado de una persona en la tabla, cuando es 0 indica que esta eliminado
     */
    const STATUS_INACTIVE = 0;
    /**
     * El estado de una Persona en la tabla, cuando es 1 indica que no esta eliminado
     */
    const STATUS_ACTIVE = 1;
    
    public static function tableName(){
        return 'persona';
    }

    /**
     * @inheritdoc reglas o validaciones de los campos de la tabla 
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['id_profesion', 'id_municipio'], 'default', 'value' => null],
            [['id_profesion', 'id_municipio'], 'integer'],
            [['nombre', 'apellido', 'correo'], 'string', 'max' => 40],
            //[['estado'], 'string', 'max' => 1],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['id_municipio' => 'id']],
            [['id_profesion'], 'exist', 'skipOnError' => true, 'targetClass' => Profesion::className(), 'targetAttribute' => ['id_profesion' => 'id']],
        ];
    }

    /**
     * @inheritdoc Valores que se visualizan por parte del usuario en el formulario
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Name',
            'apellido' => 'LastName',
            'fecha_nacimiento' => 'Birthdate',
            'correo' => 'Correo',
            'id_profesion' => 'Profession',
            'id_municipio' => 'City',
            //'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery, nos retorna los municipios
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery, nos retorna las profesiones
     */
    public function getProfesion()
    {
        return $this->hasOne(Profesion::className(), ['id' => 'id_profesion']);
    }

    // public static function getPrueba($var)
    // {
    //     // $var ="bienvenido";
    //     if($var1=="bienvenido"){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}
