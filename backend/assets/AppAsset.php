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
        '../../common/assets/bootstrap/css/bootstrap.min.css',
        '../../common/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css',
        '../../common/assets/animate/animate.css',
        '../../common/assets/css-hamburgers/hamburgers.min.css',
        '../../common/assets/animsition/css/animsition.min.css',

        '../../common/assets/select2/select2.min.css',
        '../../common/assets/daterangepicker/daterangepicker.css',
        '../../common/assets/libs/css/util.css',
        '../../common/assets/libs/css/main.css',
        '../web/css/site.css',
    ];
    public $js = [
        '../../common/assets/jquery/jquery-3.2.1.min.js',
        '../../common/assets/animsition/js/animsition.min.js',
        '../../common/assets/bootstrap/js/popper.js',
        '../../common/assets/bootstrap/js/bootstrap.min.js',
        '../../common/assets/select2/select2.min.js',
        '../../common/assets/daterangepicker/moment.min.js',
        '../../common/assets/daterangepicker/daterangepicker.js',
        '../../common/assets/countdowntime/countdowntime.js',
        '../../common/assets/libs/js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
