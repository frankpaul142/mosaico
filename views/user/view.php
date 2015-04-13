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
	    <div class="carrito-tit">DATOS DE USUARIO</div>
        <div class="contact-border"></div>
        <?php if (Yii::$app->session->hasFlash('guardado')){ ?>
            <div class="alert alert-success alert-dismissible">
                Datos guardados exitosamente
            </div>
        <?php } ?>
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
	    <?php if (Yii::$app->session->hasFlash('errorPassword')){ ?>
		    <div class="alert alert-danger alert-dismissible">
			    <?= Yii::$app->session->getFlash('errorPassword') ?>
		    </div>
	    <?php } ?>
	    <?php if (Yii::$app->session->hasFlash('passwordChanged')){ ?>
		    <div class="alert alert-success alert-dismissible">
			    Contraseña cambiada satisfactoriamente.
		    </div>
	    <?php } ?>
	    <div class="form">
			<?php $form = ActiveForm::begin(['id' => 'update-form', 'action'=>'user/change-password']); ?>
            	<div class="form-group field-user-password required">
					<div class="row col-md-10">
						<label class="control-label" for="passwordAnterior">CONTRASEÑA ANTERIOR</label>
						<input type="password" id="passwordAnterior" class="form-control" name="passwordAnterior" required>
					</div>
				</div>
				<div class="form-group field-user-password required">
					<div class="row col-md-10">
						<label class="control-label" for="passwordNueva">CONTRASEÑA NUEVA</label>
						<input type="password" id="passwordNueva" class="form-control" name="passwordNueva" required>
					</div>
				</div>
				<div class="form-group field-user-confirmpassword required">
					<div class="row col-md-10">
						<label class="control-label" for="passwordNueva2">REPETIR CONTRASEÑA</label>
						<input type="password" id="passwordNueva2" class="form-control" name="passwordNueva2" required>
						<p class="help-block help-block-error"></p>
					</div>
				</div>
				<div class="row buttons">
					<input type="hidden" name="uid" value="<?= $model->id ?>">
		        	<input type="submit" value="CAMBIAR">
		        </div>
    		<?php ActiveForm::end(); ?>
    	</div>
	</div>    

</div>
