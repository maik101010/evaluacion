<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property int $id
 * @property string $municipio
 *
 * @property Persona[] $personas
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'municipio' => 'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_municipio' => 'id']);
    }
}
