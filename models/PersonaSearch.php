<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;
use yii\data\Pagination;

/**
 * PersonaSearch representa el modelo que se encarga de buscar según la forma de `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_profesion', 'id_municipio'], 'integer'],
            [['nombre', 'apellido', 'fecha_nacimiento', 'correo', 'estado'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Crear una instancia de la clase ActiveDataProvider con una busqueda aplicada
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //traemos el estado 1 para cargar valores sin eliminar
        $query = Persona::find()->where(['estado' => Persona::STATUS_ACTIVE]);
       

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //enviamos los datos por defecto a mostrar en la paginación
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'id_profesion' => $this->id_profesion,
            'id_municipio' => $this->id_municipio,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'apellido', $this->apellido])
            ->andFilterWhere(['ilike', 'correo', $this->correo])
            ->andFilterWhere(['ilike', 'estado', $this->estado]);

        return $dataProvider;
    }
}
