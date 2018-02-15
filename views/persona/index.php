<?php
/*******************************************\
* *
* @var $modelM Municipio resultados del modelo
* @var $modelP Profesion resultados del modelo
* *
\*******************************************/
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager; 
use yii\widgets\ActiveForm; 
use yii\widgets\Breadcrumbs;
use app\models\Municipio;
use yii\helpers\Url;
use yii\widgets\Pjax;  

$this->title = 'Person';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">
    <div class="row">
        <div class="col-xs-6"><h1><?= Html::encode($this->title) ?></h1></div>
        <div class="col-xs-6"><br><?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?></div>
    </div>
    
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Person', ['create'], ['class' => 'btn btn-primary ']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=>'prueba-tabla',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'apellido',
            [
                'attribute'=>'id_profesion',
                'value'=>'profesion.profesion',
                //array de los municipio
                'filter' =>  $modelP,
            ],
            [
                'attribute'=>'id_municipio',
                'value'=>'municipio.municipio',
                //array de los municipio
                'filter' =>  $modelM,
            ],
           
            // 'fecha_nacimiento',
            'correo',
            
            //'id_profesion',
            //'id_municipio',
            //'estado',

            ['class' => yii\grid\ActionColumn::className(),],
            
        ],
        'tableOptions' =>['class' => 'table table-striped table-dark'],
    ]); ?>
     
    <!--<input 
        type="number"
        name="pageSize"
        value="< isset($_GET['pageSize']) ? $_GET['pageSize'] : 20 ?>"
        onChange="window.location = '/evaluacion/web/index.php?r=persona%2Findex&pageSize=' + this.value; ">
    </input>-->
    
    <!--<select name="pageSize" id="pageSize" onChange="window.location = '/evaluacion/web/index.php?r=persona%2Findex&pageSize=' + this.value;">-->
    

 

</div>
    </br>
    
    <div class="form-group col-md-2" >
        <label for="exampleFormControlSelect1">Select pagination</label>
        <select class="form-control" name="pageSize" id="pageSize" onChange="window.location = '/index.php?r=persona%2Findex&pageSize=' + this.value;">
            <option value="0">-----//-----</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <p style="text-align: left;">Records for page</p>
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

<!--Se agrega comentario en desde evaluacion-->