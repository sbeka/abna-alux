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
        '/stylesheets/normalize.css',
        'https://fontlibrary.org/face/montserrat',
        'https://use.fontawesome.com/releases/v5.1.1/css/all.css',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        'ttps://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
        '/stylesheets/style.css',
        '/stylesheets/calendar.css',
    ];
    public $js = [
        '/libs/jquery/dist/jquery.min.js',
        'https://unpkg.com/popper.js/dist/umd/popper.min.js',
        '/libs/bootstrap/dist/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
        'https://use.fontawesome.com/826a7e3dce.js',
        '/js/calendar.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
