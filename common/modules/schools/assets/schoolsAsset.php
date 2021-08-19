<?php 

namespace common\modules\schools\assets;

class schoolsAsset extends AssetBundle
{
	public $sourcePath = ''; //alias to asset folder in file system
	public $baseUrl = '';

	public $css = [
        'css/site.css',
        'css/login-page.css',
        'css/gridview.css',

    ];
    public $js = [
        'js/modal.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

?>