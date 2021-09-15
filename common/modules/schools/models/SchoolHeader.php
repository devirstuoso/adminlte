<?php

namespace common\modules\schools\models;
use yii2tech\filedb\ActiveRecord;

use Yii;

/**
 * This is the model class for file "SchoolHeader".
 *
 * @property string $id
 * @property string $nav_item
 * @property string $nav_link
 * 
 */
class SchoolHeader extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function fileName()
    {
        return 'SchoolHeader';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 30],
            // [['id'], 'unique'],
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
            'nav_item' => Yii::t('app', 'Navigation Item\'s Title '),
            'nav_link' => Yii::t('app', 'Navigation Item\'s Link '),


        ];
    }

    public function getSchoolHeaderContent() 
    {
        return $this->hasMany(SchoolHeaderContent::className(), ['nav_id' => 'id']);
    }
}
