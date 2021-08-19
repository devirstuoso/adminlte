<?php

namespace common\modules\schools;

/**
 * schools module definition class
 */
class School extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\schools\controllers';

    // public $basePath = 

    // public $aliases = [
    //                   "@uploads" => "common\modules\schools\uploads",
    // ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        // \Yii::configure($this, require __DIR__ . '/config.php');
        $this->setAliases(['@schools-assets' => __DIR__. '/assets']);

    }
}
