<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_events".
 *
 * @property string $id
 * @property string $ne_type
 * @property string $ne_title
 * @property string|null $ne_link * Only for external news
 * @property string|null $ne_image
 * @property string|null $ne_paragraph
 * @property string $ne_start_date
 * @property string $ne_end_date
 * @property string $ne_start_time
 * @property string $ne_end_time
 * @property string $ne_hide
 */
class NewsEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ne_type', 'ne_title'], 'required'],
            [['id'], 'string', 'max' => 30],
            [['ne_start_date', 'ne_end_date', 'ne_start_time', 'ne_end_time'], 'safe'],
            [['ne_start_date', 'ne_end_date'], 'default', 'value' => "0000-00-00"],
            [['ne_start_date', 'ne_end_date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['ne_start_date', 'ne_end_date'], 'valDate'],
            [['ne_start_date', 'ne_end_date'], 'compDate'],
            [['ne_start_time', 'ne_end_time'], 'default', 'value' => "00:00:00"],
            [['ne_title'], 'string', 'max' => 200],
            [['ne_link'], 'string', 'max' => 300],
            [['ne_paragraph'], 'string', 'max' => 600],
            [['id'], 'unique'],
            [['ne_link', 'ne_image'], 'default', 'value' => null],
            [['ne_image'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
                ],
            [['ne_hide'],'boolean', 'trueValue'=>1, 'falseValue'=>0, 'strict'=>0],

        ];
    }



    public function valDate($attribute, $params, $validator){
    if($this->$attribute != '0000-00-00'){
     if(strtotime($this->$attribute) < strtotime(date('Y-m-d'))){
        $validator->addError($this, $attribute, 'Inserted date "{value}" doesn\'t comply with any future events "{attribute}" ');
        }
      }
    }

    public function compDate($attribute, $params, $validator){
        if($this->ne_end_date != '0000-00-00'){
            if (strtotime($this->ne_start_date) > strtotime($this->ne_end_date)) { 
                if($attribute == 'ne_start_date')
                    $validator->addError($this,$attribute,'Input Correct date...');
                else
                    $validator->addError($this,$attribute,'Ending is much earlier...');
                  
            }
        }
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ne_type' => Yii::t('app', 'News/Events'), 
            'ne_title' => Yii::t('app', 'Title'),
            'ne_link' => Yii::t('app', 'External Link'),
            'ne_image' => Yii::t('app', 'Image'),
            'ne_paragraph' => Yii::t('app', 'Paragraph'),
            'ne_start_date' => Yii::t('app', 'Start Date'),
            'ne_end_date' => Yii::t('app', 'End Date'),
            'ne_start_time' => Yii::t('app', 'Start Time'),
            'ne_end_time' => Yii::t('app', 'End Time'),
            'ne_hide' => Yii::t('app', 'Hide'),

        ];
    }
}
