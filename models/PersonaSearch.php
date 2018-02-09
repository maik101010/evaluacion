<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;
use yii\data\Pagination;

/**
 * PersonaSearch represents the model behind the search form of `app\models\Persona`.
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //traemos el estado 1 para cargar valores sin eliminar
        $query = Persona::find()->where(['estado' => Persona::STATUS_ACTIVE]);
        //hacemos la paginación
       // $pagination = new Pagination(['defaultPageSize' => 5, 'totalCount' => $query->count(),]);
        //$prueba = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();
       
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //enviamos lo de la paginación
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
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
