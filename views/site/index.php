<?php
/* @var $this yii\web\View */
$this->title = 'Mosaico';
?>

<div id="nav">
    <a href="#cont1" class="circle-selected" du-scrollspy><div class="circle"></div></a>
    <a href="#cont2" class="circle-selected" du-scrollspy><div class="circle"></div></a>
    <a href="#cont3" class="circle-selected" du-scrollspy><div class="circle"></div></a>
    <a href="#cont4" class="circle-selected" du-scrollspy><div class="circle"></div></a>
</div>
<div id="cont1">
	<img src='<?= Yii::getAlias('@web'); ?>/img/fondo1.jpg'>
    <a href='#cont2'><img src="<?= Yii::getAlias('@web'); ?>/img/ico-scroll-01.png">
    </a>
</div>
<div id="cont2">
    <div class="cont2-row1">
        <div class="artesanias">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas-01.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="subastas">
            <div class="sub-tit">SUBASTAS</div>
            <div class="sub-border"></div>
            <div class="sub-txt">Lorem ipsum dolor sit amet, quo impedit rationibus ea, vero graeco intellegat ex ius. Epicuri efficiantur ex his, dicit iriure vix ea. Deseruisse posidonium sed an. Et vix habemus dissentiet, minim pericula splendide vel ad. An iuvaret reprehendunt est.</div>
            <a href="#cont1">
                <div class="sub-btn"></div>
            </a>

        </div>
        <div class="collares">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas-02.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">COLLARES</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>

        </div>

    </div>
    <div class="cont2-row2">
        <div class="bisuteria">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas2-01.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="sombreros">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas2-02.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="pulseras">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas2-03.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="bolsos">
            <img src="<?= Yii::getAlias('@web'); ?>/img/subastas2-04.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
    </div>

</div>
<div id="cont3">
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>
    <!---->
    <div class="product">
        <div class="prod-foto"><img src="<?= Yii::getAlias('@web'); ?>/img/prod-01.png">
        </div>
        <div class="prod-spec">
            <div class="prod-tit">NOMBRE DEL PRODUCTO</div>
            <div class="prod-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae.</div>
            <div class="prod-unit">
                <div class="prod-unit-txt">Unidades</div>
                <div class="select-black">
                    <div class="styled-select black">
                        <select>
                            <option>100</option>
                            <option>50</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="prod-buy"><img src="<?= Yii::getAlias('@web'); ?>/img/icon-buy-01.png">
            </div>
        </div>
    </div>


</div>
<div id="cont4">
    <div class="contact-tit">CONTACTO</div>
    <div class="contact-border"></div>
    <div class="form">

        <form id="form-form" method="post">

            <div class="form-left">
                <div class="row">
                    <label for="Form_name" class="required">NOMBRES<span class="required">*</span>
                    </label>
                    <input size="60" maxlength="100" name="Form[name]" id="Form_name" type="text" required>
                </div>
                <div class="row">
                    <label for="Form_email" class="required">MAIL<span class="required">*</span>
                    </label>
                    <input size="60" maxlength="255" name="Form[email]" id="Form_email" type="email" required>
                </div>
                <div class="row">
                    <label for="Form_city" class="required">CIUDAD<span class="required">*</span>
                    </label>
                    <input size="60" maxlength="100" name="Form[city]" id="Form_city" type="text" required>
                </div>
            </div>

            <div class="form-right">
                <div class="row">
                    <label for="Form_lastname" class="required">APELLIDOS<span class="required">*</span>
                    </label>
                    <input size="60" maxlength="100" name="Form[lastname]" id="Form_lastname" type="text" required>
                </div>
                <div class="row">
                    <label for="Form_phone" class="required">TELÉFONO <span class="required">*</span>
                    </label>
                    <input size="10" maxlength="10" name="Form[phone]" id="Form_phone" type="text" class="number" required>
                </div>
            </div>
            <div class="row">
                <label for="Form_textarea" class="required">COMENTARIO<span class="required">*</span>
                </label>
                <textarea size="60" maxlength="100" name="Form[textarea]" id="Form_textarea" type="text" required></textarea>
            </div>
            <div class="row buttons">
                <input type="submit" value="ENVIAR">
            </div>

        </form>

    </div>
    <div class="social">
        <a href="#cont1"><img class="face" src="<?= Yii::getAlias('@web'); ?>/img/social-01.png">
        </a>
        <a href="#cont1"><img class="twit" src="<?= Yii::getAlias('@web'); ?>/img/social-02.png">
        </a>
    </div>

</div>
