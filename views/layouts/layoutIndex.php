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
    <link id="linkBaseUrl" href="<?= Yii::getAlias('@web'); ?>/">
    <?php $this->head() ?>
</head>

<body ng-app="Mosaico" ng-controller="MainCtrl">

<?php $this->beginBody() ?>
    <div id="menu">
        <div class="menu-icon">
        <?php for ($i=0, $j=0; $j<sizeof($categories); $i++, $j++) {
        	if($i==3){ ?>
        		<div class="logo" ng-click="toSection('cont1')"></div>
    		<?php $j--;
    		} else { ?>
    			<div class="icon" ng-click="toSection('cont4',<?= $categories[$j]->id ?>,<?= $subs[$j] ?>)">
	                <div class="icon-img icon-<?= $categories[$j]->id ?>"></div>
	                <div class="icon-txt"><?= $categories[$j]->name ?></div>
	                <div class="tri"></div>
	            </div>
        	<?php }
        } ?>
        </div>
        <div id="notif">
            <div class="notif-ico" id="icoCarrito">
                <img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-03.png'>
            </div>
            <div class="notif-ico" ng-click="toSection('cont3')"><img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-02.png'></div>
            <?php if(Yii::$app->user->isGuest) { ?>
                <div class="notif-txt" id="loginRegistrarse">LOGIN/REGISTRARSE</div>
            <?php } else { ?>
                <div class="notif-ico"><a href='<?= Yii::getAlias('@web')."/user/view?id=".Yii::$app->user->id; ?>'><img src='<?= Yii::getAlias('@web'); ?>/img/ico-notif-01.png'></a></div>
                <div class="notif-txt">
                    <a href='<?= Yii::getAlias('@web'); ?>/site/logout' data-method="post">SALIR</a> / 
                    <a href='<?= Yii::getAlias('@web')."/user/view?id=".Yii::$app->user->id; ?>'><?= Yii::$app->user->identity->name ?></a>
                </div>
            <?php } ?>
        </div>
        
        <div class="resp-menu">
            <div class="logo-resp" ng-click="toSection('cont1')"></div>
            <div class="trigger">☰</div>
            <div style="clear:both"></div>
        </div>
        <div class="cont-menu-resp">
            <ul>
            <?php foreach ($categories as $i => $category) { ?>
            	<li class="menu-movil" id="mm<?= $i ?>"><?= $category->name ?>
                    <ul class="submenu-movil" id="sm<?= $i ?>">
                    <?php foreach ($category->subcategories as $j => $subcategory) { ?>
                    	<li ng-click="toSection('cont4',<?= $category->id ?>,<?= $subcategory->id ?>)"><?= $subcategory->name ?></li>
                	<?php } ?>
                    </ul>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div class="login"></div>
	    <div id='submenu' ng-show="loaded && inProducts" ng-cloak class="ng-cloak">
	        <div class="cont-sub">
	        	<div ng-repeat="(k, subc) in subcategory track by $index" class="animate-repeat">
	            	<div class="sub" ng-if="$index !=3" ng-click="changeSubcategory(subcategoryId[$index])">{{subc}}</div>
	            	<div class="sub" style="margin-left:14%" ng-if="$index ==3" ng-click="changeSubcategory(subcategoryId[$index])">{{subc}}</div>
	            </div>
	        </div> 
	    </div>
    </div>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
