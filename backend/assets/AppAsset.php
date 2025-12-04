<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    "/images/favicon.ico",
    "/css/vendors.min.css",
    "/css/app.min.css",
    ];
    public $js = [
    "/js/vendors.min.js",
    "/js/app.js",
    "/js/pages/dashboard.js",
        "/plugins/lucide/lucide.min.js",
    "/js/config.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
