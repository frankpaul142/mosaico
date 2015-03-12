<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/queries.css',
        '//rawgithub.com/mgcrea/angular-motion/master/dist/angular-motion.min.css',
        'css/bootstrap-additions.min.css',
    ];
    public $js = [
        'js/script.js',
        '//ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js',
        '//ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular-animate.min.js',
        '//code.angularjs.org/1.3.11/angular-route.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/angular-scroll/0.6.4/angular-scroll.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.0/angular-strap.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.0/angular-strap.tpl.min.js',
        'js/app.js',
        'js/controllers.js',
        'js/directives.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
