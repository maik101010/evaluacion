<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesion".
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
    public static function tableName()
    {
        return 'profesion';
    }

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_profesion' => 'id']);
    }
}
