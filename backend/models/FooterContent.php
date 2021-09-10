<?php

namespace backend\models;
use yii2tech\filedb\ActiveRecord;

use Yii;

/**
 * This is the model class for file "Footer".
 *
 * @property string $id
 * @property string $content_id
 * @property string $title
 * @property string $link
 * @property string $tab
 * 
 */
class FooterContent extends ActiveRecord //change to \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // public static function tableName()
    // {
    //     return 'leadership';
    // }


    public static function fileName()
    {
        return 'FooterContent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'tab'], 'required'],
            // [['id', 'content_id'], 'string', 'max' => 30],
            // [['id'], 'unique'],
            [['title', 'link'], 'string', 'max' => 300],
            [['link'], 'default', 'value' => '#'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'title' => Yii::t('app', 'Link\'s Title'),
            'link' => Yii::t('app', 'Target link'),
        ];
    }
}
