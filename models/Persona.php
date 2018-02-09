<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
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
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'correo' => 'Correo',
            'id_profesion' => 'Profesiones',
            'id_municipio' => 'Municipios',
            //'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesion()
    {
        return $this->hasOne(Profesion::className(), ['id' => 'id_profesion']);
    }
}
