<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "{{%school_slider}}".
 *
 * @property string $id
 * @property string $school_id
 * @property string $image
 * @property string $heading
 */
class SchoolSlider extends \yii\db\ActiveRecord
{
    const ID_PREFIX = 'slider';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_slider';//'{{%school_slider}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id', 'school_id'], 'required'],
            // [['id', 'school_id'], 'string', 'max' => 30],
            [['image'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
            ],
            [['heading'], 'string', 'max' => 500],
            // [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'school_id' => Yii::t('app', 'School ID'),
            'image' => Yii::t('app', 'Slider Image'),
            'heading' => Yii::t('app', 'Slider Heading'),
        ];
    }

    public function getSchool()
    {
        return $this->hasOne(Schools::className(), ['school_id' => 'school_id']);
    }
}
