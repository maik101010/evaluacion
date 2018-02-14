<?php

namespace app\models;

use Yii;

/**
 * Este es el modelo de clase para la tabla "profesion"
 *
 * @property int $id
 * @property string $profesion
 *
 * @property Persona[] $personas
 */
class Profesion extends \yii\db\ActiveRecord
{
  
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profesion'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profesion' => 'Profesion',
        ];
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()->where(['access_token' => $token])->all();
                       
    }
  
}
