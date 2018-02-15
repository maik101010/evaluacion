<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use app\models\Municipio;
use app\models\Profesion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/*************************************************\
* Esta clase implementa las funciones necesarias para el CRUD de una persona
* PHP versión 7.1
*

* @category Controllers
* @author Michael García Abelló <michael.garcia@tramasoft.com>
*
*
\*************************************************/
class PersonaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Listar todas las personas del modelo.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelM = new Municipio();
        $modelM = \yii\helpers\ArrayHelper::map(Municipio::find()->all(), 'id', 'municipio');
        $modelP = new Profesion();
        $modelP = \yii\helpers\ArrayHelper::map(Profesion::find()->all(), 'id', 'profesion');

        //traer el número de la paginación
        $request = Yii::$app->request;
        $get = $request->get('pageSize');
        if($get)
        {
            $dataProvider->pagination->pageSize = $get; 
        }

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelM'=>$modelM,
            'modelP'=>$modelP,
           
        ]);
    }

   /**
     * Mostrar una Persona del modelo.
     * @param integer $id, este parametro te permite ver una Persona en base a su id 
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crear una nueva Persona del modelo.
     */
    public function actionCreate()
    {
        $model = new Persona();
        $modelM = new Municipio();
        $model->estado = Persona::STATUS_ACTIVE;
        $token = '74191f2b7fb6da7e60be';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        $modelM = \yii\helpers\ArrayHelper::map(Municipio::find()->all(), 'id', 'municipio');
        return $this->render('create', [
            'model' => $model, 
            'modelM'=>$modelM,
            'token'=>$token,
        ]);
    }

    /**
     * Actualizar una Persona del modelo.
     * @param integer $id, este parametro te permite actualizar una Persona en base a su id 
     * @throws NotFoundHttpException Si el modelo no puede ser encontrado
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelM = new Municipio();
        $token = '74191f2b7fb6da7e60be';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }/*else{
            throw new NotFoundHttpException("La pagina no existe");
        }*/
        
        $modelM = \yii\helpers\ArrayHelper::map(Municipio::find()->all(), 'id', 'municipio');
        return $this->render('update', [
            'model' => $model,
            'modelM'=>$modelM,
            'token'=>$token,
        ]);
    }

    /**
     * Cambiar o actualizar el estado de una Persona del modelo.
     * @param integer $id, este parametro te permite actualizar el estado de una Persona en base a su id 
     * @return mixed
     * @throws NotFoundHttpException Si el modelo no puede ser encontrado
     */
    public function actionDelete($id)
    {
       
        $model = $this->findModel($id);
        $model->estado = Persona::STATUS_INACTIVE;
        if($model->save())
        {
            return $this->redirect(['index']);
        }
        //else{
        //     throw new NotFoundHttpException('La pagina no existe');
        // }
        return $this->redirect(['index']);
    }

    /**
     * 
     * Encuentra el modelo de Persona basado en su valor id o clave principal
     * @param integer $id, este parametro te permite ver una Persona en base a su id 
     * @return Persona la Clase modelo
     * @throws NotFoundHttpException si el modelo no puede ser encontrado
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}















