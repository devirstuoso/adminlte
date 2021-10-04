<?php
/**
 * @copyright Copyright (c) 2013-2017 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\tinymce;

use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{
    public $sourcePath = '@vendor/tinymce/tinymce';

    public $js = [
        'tinymce.js',
        'https://cdn.tiny.cloud/1/4a5f2zdmgpivmzvc6sk6c1fyt2b9k0tyfywjw0mx39pyo99p/tinymce/5/tinymce.min.js',

    ];
}
