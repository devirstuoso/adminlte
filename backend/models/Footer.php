<?php

namespace backend\models;
use yii2tech\filedb\ActiveRecord;

use Yii;

/**
 * This is the model class for file "Footer".
 *
 * @property string $id
 * @property string|null $logo
 * @property string $inst_name
 * @property string $inst_addr
 * @property string $inst_copyr
 * @property string $content_id
 * @property string $heading_1
 * @property string $heading_2
 * @property string $heading_3
 * 
 */
class Footer extends ActiveRecord
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
        return 'Footer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inst_name'], 'required'],
            [['id'], 'string', 'max' => 30],
            [['id'], 'unique'],
            [['logo'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
                ],
            [['inst_name', 'inst_addr', 'inst_copyr'], 'string', 'max' => 300],
            [['heading_1', 'heading_2', 'heading_3'], 'string', 'max' => 100],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Institution\' Logo'),
            'inst_name' => Yii::t('app', 'Institution\'s Name'),
            'inst_addr' => Yii::t('app', 'Institution\'s Address'),
            'inst_copyr' => Yii::t('app', 'Copyright Message'),
        ];
    }

    public function getFooterContent() 
    {
        return $this->hasMany(FooterContent::className(), ['content_id' => 'id']);
    }
}
