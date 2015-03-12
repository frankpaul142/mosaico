<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Mosaico | '.$model->name;
?>
<div class="user-view">

    <div class="img-top"><img src="img/carrito-02.png"></div>
    <div class="carrito-cont">
        <?php if (Yii::$app->session->hasFlash('guardado')){ ?>
            <div class="alert alert-success alert-dismissible">
                Datos guardados exitosamente
            </div>
        <?php } ?>
	    <div class="carrito-tit">DATOS DE USUARIO</div>
        <div class="contact-border"></div>
        <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'update-form', 'action'=>'user/update?id='.$model->id, 'fieldConfig'=>['template'=>'<div class="row col-md-5">{label}{input}{error}</div>']]); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'lastname') ?>
            <?= $form->field($model, 'username')->textInput(['readonly'=>true]) ?>
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'phone') ?>
            <div class="row buttons">
                <input type="submit" value="GUARDAR">
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
  
<div class="carrito-cont">
	    <div class="carrito-tit">CAMBIAR CONTRASEÑA</div>
    <div class="contact-border"></div>
    <div class="form">
	<form id="register-form" action="/artesanias/web/site/registro" method="post" role="form" class="ng-pristine ng-valid">
<input type="hidden" name="_csrf" value="aF9VdUNFZE5RahJFFQ8nPA8cFhAqFjYWWAs3EDUhFhtZExJNNHELew==">               
<div class="form-group field-user-password required">
<div class="row col-md-10"><label class="control-label" for="user-password">CONTRASEÑA ANTERIOR</label><input type="password" id="user-password" class="form-control" name="User[password]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-password required">
<div class="row col-md-10"><label class="control-label" for="user-password">CONTRASEÑA NUEVA</label><input type="password" id="user-password" class="form-control" name="User[password]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-confirmpassword required">
<div class="row col-md-10"><label class="control-label" for="user-confirmpassword">REPETIR CONTRASEÑA</label><input type="password" id="user-confirmpassword" class="form-control" name="User[confirmPassword]"><p class="help-block help-block-error"></p></div>
</div>        <div class="row buttons">
        	<input type="submit" value="REGISTRAR">
        </div>
    </form>	</div>
</div>    

</div>
