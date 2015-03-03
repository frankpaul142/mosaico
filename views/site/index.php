<?php
/* @var $this yii\web\View */
$this->title = 'Mosaico';
?>

<div id="nav" ng-controller="MenuCtrl">
    <!-- <a href="#home"><div class="circle" du-scrollspy="cont1"></div></a>
    <a href="#subastas"><div class="circle" du-scrollspy="cont2"></div></a>
    <a href="#productos"><div class="circle" du-scrollspy="cont3"></div></a>
    <a href="#contacto"><div class="circle" du-scrollspy="cont4"></div></a> -->
    <div class="circle" du-scrollspy="cont1" ng-click="toSection('cont1')"></div>
    <div class="circle" du-scrollspy="cont2" ng-click="toSection('cont2')"></div>
    <div class="circle" du-scrollspy="cont3" ng-click="toSection('cont3')"></div>
    <div class="circle" du-scrollspy="cont4" ng-click="toSection('cont4')"></div>
</div>
<div id="cont1">
	<img src='img/fondo1.jpg'>
    <a href='#subastas'><img src="img/ico-scroll-01.png">
    </a>
</div>
<div id="cont2">
    <div class="cont2-row1">
        <div class="artesanias">
            <img src="img/subastas-01.jpg">
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
            <img src="img/subastas-02.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">COLLARES</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>

        </div>

    </div>
    <div class="cont2-row2">
        <div class="bisuteria">
            <img src="img/subastas2-01.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="sombreros">
            <img src="img/subastas2-02.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="pulseras">
            <img src="img/subastas2-03.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
        <div class="bolsos">
            <img src="img/subastas2-04.jpg">
            <div class="sub-tri"></div>
            <div class="sub-box">
                <div class="subastas-tit">ARTESANÍAS</div>
                <div class="subastas-txt">Cu epicuri electram tincidunt has. Ne ignota facete discere usu. Mei in scripta sententiae. An sed nullam eirmod equidem.</div>
            </div>
        </div>
    </div>

</div>
<div id="cont3" ng-view ng-animate="getAnimation()" ng-controller="MenuCtrl">
    
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
        <a href="#cont1"><img class="face" src="img/social-01.png">
        </a>
        <a href="#cont1"><img class="twit" src="img/social-02.png">
        </a>
    </div>

</div>
