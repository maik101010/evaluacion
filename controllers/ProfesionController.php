<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Profesion;
use yii\filters\auth\HttpBearerAuth;

class ProfesionController extends ActiveController
{
    public $modelClass = 'app\models\Profesion';

    
    //metodo para probar el funcionamiento de la Api sin render
    public function actionView($id){
        return Profesion::findOne($id);

    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
        ];
        return $behaviors;
    }
}