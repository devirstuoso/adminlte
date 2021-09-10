<?php

namespace backend\models;
use yii2tech\filedb\ActiveRecord;

use Yii;

/**
 * This is the model class for file "Header".
 *
 * @property string $id
 * @property string $nav_id
 * @property string $nav_sub_item
 * @property string $nav_sub_link
 * 
 */
class HeaderContent extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function fileName()
    {
        return 'HeaderContent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nav_sub_item'], 'required'],
            // [['id', 'content_id'], 'string', 'max' => 30],
            // [['id'], 'unique'],
            [['nav_sub_item'], 'string', 'max' => 100],
            [['nav_sub_link'], 'string', 'max' => 300],
            [['nav_sub_link'], 'default', 'value' => '#'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nav_id' => Yii::t('app', 'Sub Navigation ID'),
            'nav_sub_item' => Yii::t('app', 'Sub Navigation Title'),
            'nav_sub_link' => Yii::t('app', 'Sub Navigation Link'),
        ];
    }
}
