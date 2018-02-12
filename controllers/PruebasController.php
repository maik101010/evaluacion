<?php
namespace app\controllers;
use Yii;
use app\models\Persona;

use yii\data\ActiveDataProvider;

use yii\web\Controller;

class PruebasController extends Controller {


    public function actionPrueba()
    {
            
        $query = Persona::find()->where(['id' => 1]);

        $provider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 10,
        ],
        // 'sort' => [
        //     'defaultOrder' => [
        //         'created_at' => SORT_DESC,
        //         'title' => SORT_ASC, 
        //     ]
        // ],
        ]);

        // returns an array of Post objects
        $posts = $provider->getModels();

        foreach($posts as $var){
            echo " ". $var["nombre"];
        }
        //var_dump($posts);
    }

    public function actionPruebas()
    {
            
        $edad = 19;

        echo $edad>18 ? "Bienvenido bb mayor" : "No bienvenido";
        
    }

}