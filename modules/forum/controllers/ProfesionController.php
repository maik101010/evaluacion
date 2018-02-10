<?php
namespace app\modules\forum\controllers;
use yii\rest\ActiveController;

class ProfesionController extends ActiveController
{
    // ...
    public $modelClass = 'app\modules\forum\models\Profesion';

    // public function verbs()
    // {
    //     $res = parent::verb();

    //     return $res;
    // }
}