<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Profesion;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
/*************************************************\
* Esta clase implementa las funciones necesarias para el CRUD de una persona
* PHP versión 7.1
*

* @category Controllers
* @author Michael García Abellí <michael.garcia@tramasoft.com>
*
*
\*************************************************/
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    // public function behaviors()
    // {
    //     $behaviors = parent::behaviors();
    //     $behaviors['authenticator'] = [
    //         'class' => CompositeAuth::className(),
    //         'authMethods' => [
    //             HttpBasicAuth::className(),
    //             HttpBearerAuth::className(),
    //             QueryParamAuth::className(),
    //         ],
    //     ];
    //     return $behaviors;
    // }

    public function behaviors() {
    	$behaviors = parent::behaviors();
    	$behaviors['autheticator'] = [
    		'class' => HttpBearerAuth::className()
    	];
    	return $behaviors;
    }

    public function actionLogin()
    {
            $token = '$erw';
            $model = new Profesion;
            //$model = User::findIdentityByAccessToken($token);
            
            return $this->render('vista', ['model'=>$model, 'token'=>$token]);
    }
    // public function actionIndex()
    // {
    //     //user database
    //     $username = "maik";
    //     $identity = User::findOne(['username' => $username]);

    //     // log in the user
    //     //Yii::$app->user->login($identity);
        
    //     //logout in the user
    //     Yii::$app->user->logout();
    //     $id = Yii::$app->user->id;
    //     echo " ".$id;

       
    //     // $model = User::find()->all();
    //     // foreach($model as $var){
    //     //     echo ' '. $var['username'];
    //     // }
    //     //echo '' .$model['username'];
        
    // }
}