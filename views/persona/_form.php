<?php
/*******************************************\
* *
* @var $this ProfesionController Descripcion cort a*
* @var $model Persona validar los campos del modelo *

* *
\*******************************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use richardfan\widget\JSRegister;
use yii\helpers\Url;

?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">

            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <!--< $form->field($model, 'fecha_nacimiento')->textInput() ?>-->
    <!--< DatePicker::widget([
    $model => 'fecha_nacimiento',
    //'fecha_nacimiento' => $model,
    'attribute' => 'from_date',
    'language' => 'es',
    //'dateFormat' => 'yyyy-MM-dd',
    ]);?>-->
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'fecha_nacimiento')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'es',
        'dateFormat' => 'yyyy-MM-dd',
	    'options' => ['class' => 'form-control'],
    //'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
        </div>
    
        <div class="col-md-6">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">        
            <!--< $form->field($model, 'id_profesion')->textInput() ?>-->
            <?= $form->field($model, 'id_profesion')->dropDownList([]) ?>
        </div>
    
        <div class="col-md-6">
            <?= $form->field($model, 'id_municipio')->dropdownList($modelM,
            ['prompt'=>'Select Ciudad']) ?>
        </div>
        
    </div>
    <!--<div class="row">
        <div class="col-md-6">        
    < $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
        </div>
    </div>-->        
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?php JSRegister::begin(); ?>
            $.ajax({
                url: '<?= Url::to(['profesion/index']) ?>',
                type: 'get',
                headers: {
			        'Authorization': 'Bearer ' + '<?= $token ?>'
			    },
                success: function(res) {
                    for(var i in res) {
                        $('#persona-id_profesion').append(`
                            <option value="${res[i].id}">${res[i].profesion}</option>
                        `);
                    }
                    //alert('Bien')
                }
            })
    <?php JSRegister::end(); ?>                
        

</div>
