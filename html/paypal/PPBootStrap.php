<?php
/**
 * Include this file in your application. This file sets up the required classloader based on 
 * whether you used composer or the custom installer.
 */

// 
require_once 'Configuration.php';

require 'PPAutoloader.php';
spl_autoload_unregister(['Yii','autoload']);
PPAutoloader::register();
spl_autoload_register(['Yii','autoload']);