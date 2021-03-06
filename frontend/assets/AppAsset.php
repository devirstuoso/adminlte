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
        // 'css/site.css',
        // 'css/container.css',
        // 'css/newsevents.css',
        'css/nicepage.css',
        'css/home.css',
        'css/about.css',
        'css/news-events.css',
        'css/schools.css',
        'css/school-home.css',
        'css/leadership.css',
        'css/govcouncil.css',
    ];
    public $js = [
        'js/nicepage.js',
        'js/jquery.js',
        'js/query.js',
        // 'js/jquery-2.js',
        // 'js/schools.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
