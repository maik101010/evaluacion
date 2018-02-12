<?php
/*******************************************\
* *
* @var $model Persona renderizar los campos a la vista _form
* @var $modelC Persona renderizar las ciudades a la vista _form
* *
\*******************************************/
use yii\helpers\Html;


$this->title = 'Create Person';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'modelM'=>$modelM
    ]) ?>

</div>
