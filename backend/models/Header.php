<?php

namespace backend\models;
use yii2tech\filedb\ActiveRecord;

use Yii;

/**
 * This is the model class for file "Header".
 *
 * @property string $id
 * @property string|null $logo
 * @property string $nav_item
 * @property string $nav_link
 * 
 */
class Header extends ActiveRecord
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
        return 'Header';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 30],
            [['id'], 'unique'],
            [['logo'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
                ],
            [['nav_item'], 'string', 'max' => 100],
            [['nav_link'], 'string', 'max' => 300],
            [['nav_link'], 'default', 'value' => '#'],
            [['nav_order'], 'integer'],
            [['nav_order'], 'unique', 'message' => 'Place it into another position'],




        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Institution\'s Logo'),
            'nav_item' => Yii::t('app', 'Navigation Item\'s Title '),
            'nav_link' => Yii::t('app', 'Navigation Item\'s Link '),


        ];
    }

    public function getHeaderContent() 
    {
        return $this->hasMany(HeaderContent::className(), ['nav_id' => 'id']);
    }
}
