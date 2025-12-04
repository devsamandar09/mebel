<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "/images/favicon/apple-icon-57x57.png",
        "/images/favicon/apple-icon-60x60.png",
        "/images/favicon/apple-icon-72x72.png",
        "/images/favicon/apple-icon-76x76.png",
        "/images/favicon/apple-icon-114x114.png",
        "/images/favicon/apple-icon-120x120.png",
        "/images/favicon/apple-icon-144x144.png",
        "/images/favicon/apple-icon-152x152.png",
        "/images/favicon/apple-icon-180x180.png",
        "/images/favicon/android-icon-192x192.png",
        "/images/favicon/favicon-32x32.png",
        "/images/favicon/favicon-96x96.png",
        "/images/favicon/favicon-16x16.png",
        "/images/favicon/manifest.json",
        "../ms-icon-144x144.html",
        "/bootstrap/bootstrap.min.css",
        "/js/bootstrap.min.js",
        "../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css",
        "/css/style.css",
        "/css/custom-style.css",
        "/css/special-classes.css",
        "/css/responsive.css",
        "/css/owl.carousel.min.css",
        "/css/owl.theme.default.min.css",
        "../../cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css",
        "../../unpkg.com/aos%402.3.1/dist/aos.css"
    ];
    public $js = [
        "/js/jquery-3.6.0.min.js",
        "/js/bootstrap.min.js",
        "/js/video_link.js",
        "/js/video.js",
        "/js/counter.js",
        "/js/owl.carousel.js",
        "/js/custom-carousel.js",
        "/js/custom.js",
        "/js/animation_links.js",
        "/js/animation.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
