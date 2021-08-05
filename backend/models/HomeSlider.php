<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "home_slider".
 *
 * @property string $id
 * @property string|null $slider_image
 * @property string|null $slider_header_text
 * @property string|null $slider_subheader_text
 * @property string|null $slider_description_text
 * @property string|null $slider_button
 * @property boolean|true $slider_button_hide
 * @property boolean|true $slider_hide
 */


class HomeSlider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['slider_header_text', 'slider_subheader_text', 'slider_description_text'], 'string'],
            [['id'], 'string', 'max' => 30],
            [['id'], 'unique'],
            [['slider_image'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
              #'minWidth' => 1200, 'maxWidth' => 2000,
              #'minHeight' => 630, 'maxHeight' => 1080,
              
                ],
            [['slider_button'], 'string', 'max' => 200],
            [['slider_button_text'], 'string', 'max' => 15],
            [['slider_button_hide'],'boolean', 'trueValue'=>1, 'falseValue'=>0, 'strict'=>0],
            [['slider_hide'],'boolean', 'trueValue'=>1, 'falseValue'=>0, 'strict'=>0],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slider_image' =>  Yii::t('app', 'Slider Image'),
            'slider_header_text' =>  Yii::t('app', 'Slider Header Text'),
            'slider_subheader_text' =>  Yii::t('app', 'Slider Subheader Text'),
            'slider_description_text' =>  Yii::t('app', 'Slider Description Text'),
            'slider_button' => Yii::t('app', 'Slider Button Link'),
            'slider_button_text' =>  Yii::t('app', 'Slider Button Label'),
            'slider_button_hide' =>  Yii::t('app', 'Hide Button'),
            'slider_hide' => 'Hide',
        ];
    }
}
