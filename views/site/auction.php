<?php
$this->title='Mosaico | Subastas';
?>
<div class="img-top"><img src="img/carrito-02.png"></div>
<div class="subastas-cont">
    <div class="subastas-cont-cent">
        <div class="subastas-tit-2">SUBASTAS</div>
            <div class="subastas-border"></div>
	        <div class="titulos">PRODUCTO</div>
	        <?php foreach ($products as $i => $product) { ?>
	        <div class="subastas-div">
	            <div class="subastas-div-img"><img src="img/products/<?= $product->image ?>"></div>
	            <div class="left-1"><?= $product->name ?></div>
	            <div class="subastas-div-left">
	            	<div style="display:none" id="cd<?= $product->id ?>"><?= strtotime($product->creation_date)+($time*60*60) ?></div>
	                <div class="left-2"><strong>LA SUBASTA TERMINA EN: </strong><span class="rt" id="remaining_time<?= $product->id ?>"> h :  m :  s</span></div>
	                <div class="left-3">
		                <label for="Form_phone" class="required">OFERTA: <span class="required">*</span></label>
		                <input size="10" maxlength="10" name="offert" id="Form_phone" type="text" class="number" required="">
	                </div>
	            </div>
	            <div class="subastas-div-right">
	                <div class="right-1"><strong>VALOR DE SUBASTA: </strong>$ <?= $product->price ?></div>
	                <div class="right-2">
			        	<input type="submit" value="SUBASTAR">
			        </div>
            	</div>
        	</div>
        	<?php } ?>
        </div>        
    </div>    
</div>
