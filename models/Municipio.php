<?php

namespace app\models;

use Yii;

/**
 * Este es el modelo de clase para la tabla "municipio".
 *
 * @property int $id
 * @property string $municipio
 *
 */
class Municipio extends \yii\db\ActiveRecord
{
     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['municipio'], 'string', 'max' => 40],
        ];
    }
    
    /**
     * @inheritdoc, metodo que nos muestra el valor del label en el formulario
     */
    public function attributeLabels()
    {
         return [
             'id' => 'ID',
             'municipio' => 'Municipio',
         ];
     }

    // /**
    //  * @return \yii\db\ActiveQuery 
    //  */
    // public function getPersonas()
    // {
    //     return $this->hasMany(Persona::className(), ['id_municipio' => 'id']);
    // }
}
