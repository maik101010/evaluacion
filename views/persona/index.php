<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;  
use app\models\Municipio;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            [
                'attribute'=>'id_municipio',
                'value'=>'municipio.municipio',
                //array de los municipio
                'filter' =>  $modelC,
            ],
            [
                'attribute'=>'id_profesion',
                'value'=>'profesion.profesion',
                //array de los municipio
                'filter' =>  $modelP,
            ],
           // 'fecha_nacimiento',
            'correo',
            
            //'id_profesion',
            //'id_municipio',
            //'estado',

            ['class' => yii\grid\ActionColumn::className(),],
            
        ],
    ]); ?>

    <!--<input 
        type="number"
        name="pageSize"
        value="< isset($_GET['pageSize']) ? $_GET['pageSize'] : 20 ?>"
        onChange="window.location = '/evaluacion/web/index.php?r=persona%2Findex&pageSize=' + this.value; ">
    </input>-->
    
    <!--<select name="pageSize" id="pageSize" onChange="window.location = '/evaluacion/web/index.php?r=persona%2Findex&pageSize=' + this.value;">-->
        <select name="pageSize" id="pageSize" onChange="window.location = '/index.php?r=persona%2Findex&pageSize=' + this.value;">
                                                                      
        <option value="0">Seleccionar paginación</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    </br>
    <p>Registros por página</p>
    </div>
    <!--Cambio desde evaluación-->


    <!--

    <select id="mySelect" onchange="myFunction()">
    <option value="Audi">Audi
    <option value="BMW">BMW
    <option value="Mercedes">Mercedes
    <option value="Volvo">Volvo
    </select>

    <p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

    <p id="demo"></p>

    <script>
    function myFunction() {
        var x = document.getElementById("mySelect").value;
        document.getElementById("demo").innerHTML = "You selected: " + x;
    }
    </script>

</div>
<script type="text/javascript">
 /*  function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;*/
}
</script>-->