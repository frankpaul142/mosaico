<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Subcategory;
use yii\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$script=
<<< JS
$( document ).ready(function() {
$('#product-auction').change(function() {
    if($(this).val()=='YES'){
  $('.field-product-subcategory_id').hide();
  ('#product-subcategory_id').val("");
    }else{
       $('.field-product-subcategory_id').show();  
    }
});
});
JS;
$this->registerJs($script,View::POS_END);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'auction')->dropDownList([ 'YES' => 'SI', 'NO' => 'NO', ], ['prompt' => '¿Producto como subasta?']) ?>

    <?= $form->field($model,'subcategory_id')->DropDownList(ArrayHelper::map(Subcategory::find()->all(), 'id', 'name'), ['prompt' => 'Selecciona una subcategoría.']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?php if(isset()) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => 'Selecciona un estatus.']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



