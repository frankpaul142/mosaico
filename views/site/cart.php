<?php
$this->title="Mosaico | Carrito de Compras";
?>

<div class="img-top"><img src="img/carrito-01.png"></div>
<div class="carrito-cont">
    <div class="carrito-tit">CARRITO DE COMPRAS</div>
    <div class="contact-border"></div>
    <div class="carrito-left">
        <?php if(Yii::$app->user->isGuest){ ?>
            <div class="carrito-usr" ng-click="openLogin()" style="cursor:pointer">
                Login / Registrarse
            </div>
        <?php } else { ?>
        <div class="carrito-left-tit">Datos Personales</div>
        <!-- <div class="carrito-img"><img src=""></div> -->
        <div class="carrito-usr">
            <div class="usr-txt">NOMBRE: <?= Yii::$app->user->identity->name ?></div>
            <div class="usr-txt">DIRECIÓN: <?= Yii::$app->user->identity->address ?></div>
            <div class="usr-txt">TELÉFONO: <?= Yii::$app->user->identity->phone ?></div>
            <div><a href="<?= Yii::getAlias('@web')."/user/view?id=".Yii::$app->user->id; ?>">Editar datos</a></div>
        </div>
        <?php } ?>
    </div>
    <div class="carrito-right">
        <div class="carrito-right-tits">
            <div class="tits">PRODUCTO</div>
            <div class="tits1">CANTIDAD</div>
            <div class="tits1">V.UNITARIO</div>
            <div class="tits1">V.TOTAL</div>
        </div>
        <?php foreach ($cart as $i => $product) { ?>
        <div class="carrito-right-cont">
            <div class="producto">
                <div class="prod-img"><img src="img/carrito-prod-01.png"></div>
                <div class="prod-txt"><?= $product['name'] ?></div>
            </div>
            <div class="cantidad">                          
                <div class="styled-select ">
                    <select class="selectQuantity" id="sq<?= $i ?>">
                    <?php for ($j=1; $j<=$product['stock']; $j++) { ?>
                        <option <?php if($j==$product['quantity']) echo "selected"; ?>><?= $j ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="unitario"><label><?= $product['price'] ?></label></div>
            <div class="total">
                <label><?= $product['total'] ?></label>
                <a href ='<?= Yii::getAlias('@web').'/site/remove-from-cart?productId='.$i.'&redirect=1' ?>'><img src="img/cerrar-01.jpg"></a>
            </div>            
        </div>
        <?php } ?>
        <div class="comprar">
        <label>$ <?= $total ?></label>
        <div class="comprar-txt">TOTAL</div>
        <a href ='#'><img src="img/ico-comprar-01.png"></a>
    </div>
    </div>
    
</div>
