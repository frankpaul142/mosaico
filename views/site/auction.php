<?php
$this->title='Mosaico | Subastas';
?>
<div class="img-top"><img src="img/carrito-02.png"></div>
<div class="subastas-cont">
    <div class="subastas-cont-cent">
        <div class="subastas-tit-2">SUBASTAS</div>
            <div class="subastas-border"></div>
	        <div class="titulos">PRODUCTO</div>
	        <?php foreach ($auctions as $i => $auction) { ?>
	        <div class="subastas-div" id="sd<?= $auction->id ?>">
	            <div class="subastas-div-img"><img src="img/products/<?= $auction->product->image ?>"></div>
	            <div class="left-1"><?= $auction->product->name ?></div>
	            <div class="subastas-div-left">
	            	<div style="display:none" id="cd<?= $auction->id ?>"><?= strtotime($auction->product->creation_date)+($time*60*60) ?></div>
	                <div class="left-2"><strong>LA SUBASTA TERMINA EN: </strong><span class="rt" id="remaining_time<?= $auction->id ?>"> h :  m :  s</span></div>
	                <div class="left-3">
		                <label for="puja<?= $auction->id ?>" id="lbl<?= $auction->id ?>" class="required">OFERTA:</label>
		                <input min="0" id="puja<?= $auction->id ?>" type="number" class="number" required>
	                </div>
	            </div>
	            <div class="subastas-div-right">
	                <div class="right-1"><strong>VALOR DE SUBASTA: </strong>$ <span id="pp<?= $auction->id ?>"><?= $auction->value ?></span></div>
	                <div class="right-2">
			        	<input type="submit" class="ofertar_puja" id="op<?= $auction->id ?>" value="OFERTAR">
			        </div>
            	</div>
        	</div>
        	<?php } ?>
        </div>        
    </div>    
</div>
