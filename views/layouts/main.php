<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <base href="<?= Yii::getAlias('@web'); ?>/web">
    <?php $this->head() ?>
</head>

<body ng-app="Mosaico">

<?php $this->beginBody() ?>
    <div id="menu" ng-controller="MenuCtrl">
        <div class="menu-icon">
            <div class="icon">
                <div class="icon-img icon-1"></div>
                <div class="icon-txt">SOMBREROS</div>
                <div class="tri"></div>
            </div>
            <div class="icon">
                <div class="icon-img icon-2"></div>
                <div class="icon-txt">BISUTERÍA</div>
                <div class="tri"></div>
            </div>
            <div class="icon">
                <div class="icon-img icon-3"></div>
                <div class="icon-txt">PULSERAS</div>
                <div class="tri"></div>
            </div>

            <!-- <a href='<?= Yii::getAlias('@web'); ?>'> -->
                <div ng-click="toTheTop()" class="logo"></div>
            <!-- </a> -->
            <div class="icon">
                <div class="icon-img icon-4"></div>
                <div class="icon-txt">COLLARES</div>
                <div class="tri"></div>
            </div>
            <div class="icon">
                <div class="icon-img icon-5"></div>
                <div class="icon-txt">FIGURAS</div>
                <div class="tri"></div>
            </div>
            <div class="icon">
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
            <div ng-click="toTheTop()" class="logo-resp"></div>
            <div class="trigger">☰</div>

        </div>
        <div class="cont-menu-resp">
            <ul>
                <li><a href="#">SOMBREROS</a>
                </li>
                <li><a href="#">BISUTERIA</a>
                </li>
                <li><a href="#">PULSERAS</a>
                </li>
                <li><a href="#">COLLARES</a>
                </li>
                <li><a href="#">FIGURAS</a>
                </li>
                <li><a href="#">BOLSOS</a>
                </li>
            </ul>
        </div>
        <div class="login"></div>
        
    </div>

    <?= $content ?>

    <div id="footer">
        <img src="<?= Yii::getAlias('@web'); ?>/img/logo.jpg">
        <div class="foot-txt">® 2015 Mosaico. Todos los Derechos Reservados. Desarrollado por <a href="#cont3">SHARE DITAL AGENCY</a> <a href="#cont3">SOMBREROS</a> / <a href="#cont3">BISUTERIA</a> / <a href="#cont3">PULSERAS</a> / <a href="#cont3">COLLARES</a> / <a href="#cont3">FIGURAS</a> / <a href="#cont3">BOLSOS</a> </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.3.11/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-scroll/0.6.4/angular-scroll.min.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/app.js"></script>
    <script src="<?= Yii::getAlias('@web'); ?>/js/controllers.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
