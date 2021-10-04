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
        'css/site.css',
        'css/login-page.css',
        'css/gridview.css',

    ];
    public $js = [
        'js/modal.js',
        'js/tinymce.js',
        'https://cdn.tiny.cloud/1/4a5f2zdmgpivmzvc6sk6c1fyt2b9k0tyfywjw0mx39pyo99p/tinymce/5/tinymce.min.js',

    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
