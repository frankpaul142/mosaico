<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Mosaico - Registro';
?>
<div class="img-top"><img src="img/carrito-02.png"></div>
<div class="carrito-cont">
	<?php if (Yii::$app->session->hasFlash('errorRegistro')){ ?>
	    <div class="alert alert-danger">
		    <?= Yii::$app->session->getFlash('errorRegistro') ?>
	    </div>
    <?php } ?>
    <div class="carrito-tit">FORMULARIO DE REGISTRO</div>
    <div class="contact-border"></div>
    <div class="form">
	<?php $form = ActiveForm::begin(['id' => 'register-form', 'fieldConfig'=>['template'=>'<div class="row col-md-5">{label}{input}{error}</div>']]); ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'lastname') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
        <div class="row buttons">
        	<input type="submit" value="REGISTRAR">
        </div>
    <?php ActiveForm::end(); ?>
	</div>
</div>