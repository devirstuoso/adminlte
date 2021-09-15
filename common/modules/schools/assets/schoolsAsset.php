<?php 

namespace common\modules\schools\assets;
use yii\web\AssetBundle;


class schoolsAsset extends AssetBundle
{
	public $sourcePath = '@schools-web'; //alias to asset folder in file system
	public $baseUrl = '';

	public $css = [
        'css/schools.css',
        'css/school-home.css',

    ];
    public $js = [
        '',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

?>
