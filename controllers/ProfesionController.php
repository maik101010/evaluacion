<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Profesion;
use yii\filters\auth\HttpBearerAuth;
/**
 * Esta es el controlador de clase para el modelo  "Profesion".
 *
 * 
 */
class ProfesionController extends ActiveController
{
    public $modelClass = 'app\models\Profesion';

	/**
	 * Autenticar la profesión por medio de la clase HttpBearerAuth
	 * 
	 */
    public function behaviors() {
    	$behaviors = parent::behaviors();
    	$behaviors['autheticator'] = [
    		'class' => HttpBearerAuth::className()
    	];
    	return $behaviors;
    }
 
   
}






















/*   public function actionView($id){
    return Profesion::findOne($id);

}
*/