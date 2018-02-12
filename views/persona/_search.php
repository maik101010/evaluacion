<?php
/*******************************************\
* *
* @var $model PersonaSearch validar los campos del modelo*

* *
\*******************************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <?= $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'id_profesion') ?>

    <?php // echo $form->field($model, 'id_municipio') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
