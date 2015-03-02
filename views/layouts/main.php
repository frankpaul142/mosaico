<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Product;
use app\models\Category;
use app\models\Subcategory;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$categories=Category::findAll(['status'=>'ACTIVE']);
$subs=[];
foreach ($categories as $i => $category) {
    $subs[]=$category->subcategories[0]->id;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?= Yii::getAlias('@web'); ?>/#/">
    <?php $this->head() ?>
</head>

<body ng-app="Mosaico">

<?php $this->beginBody() ?>
    <div id="menu" ng-controller="MenuCtrl">
        <div class="menu-icon">
            <div class="icon" ng-click="toSection('cont3',1,<?php echo $subs[0] ?>)">
                <div class="icon-img icon-1"></div>
                <div class="icon-txt">SOMBREROS</div>
                <div class="tri"></div>
            </div>
            <div class="icon" ng-click="toSection('cont3',2,<?php echo $subs[1] ?>)">
                <div class="icon-img icon-2"></div>
                <div class="icon-txt">BISUTERÍA</div>
                <div class="tri"></div>
            </div>
            <div class="icon" ng-click="toSection('cont3',3,<?php echo $subs[2] ?>)">
                <div class="icon-img icon-3"></div>
                <div class="icon-txt">PULSERAS</div>
                <div class="tri"></div>
            </div>
            <div class="logo" ng-click="toSection('cont1')"></div>
            <div class="icon" ng-click="toSection('cont3',4,<?php echo $subs[3] ?>)">
                <div class="icon-img icon-4"></div>
                <div class="icon-txt">COLLARES</div>
                <div class="tri"></div>
            </div>
            <div class="icon" ng-click="toSection('cont3',5,<?php echo $subs[4] ?>)">
                <div class="icon-img icon-5"></div>
                <div class="icon-txt">FIGURAS</div>
                <div class="tri"></div>
            </div>
            <div class="icon" ng-click="toSection('cont3',6,<?php echo $subs[5] ?>)">
                <div class="icon-img icon-6"></div>
                <div class="icon-txt">BOLSOS</div>
                <div class="tri"></div>
            </div>
        </div>
        <div id="notif">
            <div class="notif-ico"><a href='#'><img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-03.png'></a></div>
            <div class="notif-ico"><a href='#'><img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-02.png'></a></div>
            <div class="notif-ico"><a href='#'><img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-01.png'></a></div>
            <div class="notif-txt"><a href='#'>LOGIN/REGISTRATE</a></div>
        </div>
        
        <div class="resp-menu">
            <div class="logo-resp"></div>
            <div class="trigger">☰</div>

        </div>
        <div class="cont-menu-resp">
            <ul>
                <li id="menu-sombreros"><a href="#">SOMBREROS</a>
                    <ul class="submenu-movil" id="sub-sombreros">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>
                    
                </li>
                <li id="menu-bisuteria"><a href="#">BISUTERIA</a>
                    <ul class="submenu-movil" id="sub-bisuteria">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>            
                    
                </li>
                <li id="menu-pulseras"><a href="#">PULSERAS</a>
                    <ul class="submenu-movil" id="sub-pulseras">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>                    
                </li>
                <li id="menu-collares"><a href="#">COLLARES</a>
                    <ul class="submenu-movil" id="sub-collares">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>                     
                </li>
                <li id="menu-figuras"><a href="#">FIGURAS</a>
                    <ul class="submenu-movil" id="sub-figuras">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>                     
                </li>
                <li id="menu-bolsos"><a href="#">BOLSOS</a>
                    <ul class="submenu-movil" id="sub-bolsos">
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                        <li><a href="#">PAJA TOQUILLA</a></li>
                    </ul>                     
                </li>
            </ul>
        </div>
        <div class="login"></div>
	    <div id='submenu' ng-show="loaded && inProducts">
	        <div class="cont-sub">
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[0])">{{subcategory[0]}}</div>
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[1])">{{subcategory[1]}}</div>
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[2])">{{subcategory[2]}}</div>
	            <div class="sub"></div>
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[3])">{{subcategory[3]}}</div>
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[4])">{{subcategory[4]}}</div>
	            <div class="sub" ng-click="changeSubcategory(subcategoryId[5])">{{subcategory[5]}}</div>
	        </div> 
	    </div>
    </div>

    <?= $content ?>

    <div id="footer">
        <img src="<?= Yii::getAlias('@web'); ?>/img/logo.jpg">
        <div class="foot-txt">
            ® 2015 Mosaico. Todos los Derechos Reservados. Desarrollado por <a href="#">SHARE DITAL AGENCY</a> <a href="#">SOMBREROS</a> / <a href="#">BISUTERIA</a> / <a href="#">PULSERAS</a> / <a href="#">COLLARES</a> / <a href="#">FIGURAS</a> / <a href="#">BOLSOS</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.3.11/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-scroll/0.6.4/angular-scroll.min.js"></script>
    <!--<script src="js/angular-scroll-master/angular-scroll.js"></script>-->
    <script src="<?= Yii::getAlias('@web'); ?>/js/app.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/controllers.js"></script>
    <script>
        

    </script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
