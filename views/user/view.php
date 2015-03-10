<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
?>
<div class="user-view">

 <div class="img-top"><img src="img/carrito-02.png"></div>
<div class="carrito-cont">
	    <div class="carrito-tit">DATOS DE USUARIO</div>
    <div class="contact-border"></div>
    <div class="form">
	<form id="register-form" action="/artesanias/web/site/registro" method="post" role="form" class="ng-pristine ng-valid">
<input type="hidden" name="_csrf" value="aF9VdUNFZE5RahJFFQ8nPA8cFhAqFjYWWAs3EDUhFhtZExJNNHELew==">        <div class="form-group field-user-name required">
<div class="row col-md-5"><label class="control-label" for="user-name">NOMBRES</label><input type="text" id="user-name" class="form-control" name="User[name]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-lastname required">
<div class="row col-md-5"><label class="control-label" for="user-lastname">APELLIDOS</label><input type="text" id="user-lastname" class="form-control" name="User[lastname]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-address required">
<div class="row col-md-5"><label class="control-label" for="user-address">CÉDULA</label><input type="text" id="user-address" class="form-control" name="User[address]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-username required">
<div class="row col-md-5"><label class="control-label" for="user-username">EMAIL</label><input type="text" id="user-username" class="form-control" name="User[username]"><p class="help-block help-block-error"></p></div>
</div>         <div class="form-group field-user-password required">
<div class="row col-md-5"><label class="control-label" for="user-password">TELÉFONO</label><input type="password" id="user-password" class="form-control" name="User[password]"><p class="help-block help-block-error"></p></div>
</div>        <div class="form-group field-user-confirmpassword required">
<div class="row col-md-5"><label class="control-label" for="user-confirmpassword">CELULAR</label><input type="password" id="user-confirmpassword" class="form-control" name="User[confirmPassword]"><p class="help-block help-block-error"></p></div>
</div>  <div class="row buttons">
        	<input type="submit" value="EDITAR">
        </div>        
    </form>	</div>
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
