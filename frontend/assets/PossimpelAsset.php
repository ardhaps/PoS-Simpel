<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class PossimpelAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '../../common/assets/bootstrap/css/bootstrap.min.css',
        '../../common/assets/fonts/circular-std/style.css',
        '../../common/assets/libs/css/style.css',
        '../../common/assets/fonts/fontawesome/css/fontawesome-all.css',
        '../../common/assets/charts/chartist-bundle/chartist.css',
        '../../common/assets/charts/morris-bundle/morris.css',
        '../../common/assets/fonts/material-design-iconic-font/css/materialdesignicons.min.css',
        '../../common/assets/charts/c3charts/c3.css',
        '../../common/assets/fonts/flag-icon-css/flag-icon.min.css',
    ];
    public $js = [
        '../../common/assets/jquery/jquery-3.3.1.min.js',
        '../../common/assets/bootstrap/js/bootstrap.bundle.js',
        '../../common/assets/slimscroll/jquery.slimscroll.js',
        '../../common/assets/parsley/parsley.js',
        '../../common/assets/js/main-js.js',
        '../../common/assets/charts/chartist-bundle/chartist.min.js',
        '../../common/assets/charts/sparkline/jquery.sparkline.js',
        '../../common/assets/charts/morris-bundle/raphael.min.js',
        '../../common/assets/charts/morris-bundle/morris.js',
        '../../common/assets/charts/c3charts/c3.min.js',
        '../../common/assets/charts/c3charts/d3-5.4.0.min.js',
        '../../common/assets/charts/c3charts/C3chartjs.js',
        '../../common/assets/js/dashboard-ecommerce.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
