<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property string $id
 * @property string $school_id
 * @property string $title
 */
class Schools extends \yii\db\ActiveRecord
{   
    const ID_PREFIX = 'schools';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'title'], 'required'],
            [['id', 'school_id'], 'string', 'max' => 30],
            [['school_id'], 'compare', 'compareValue' => 'school_', 'operator'=> '!=', 'message' =>'append the school code.'],
            [['title'], 'string', 'max' => 300],
            [['school_logo'], 'string', 'max' => 10000],
            [['id', 'school_id'], 'unique'],
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
            'title' => Yii::t('app', 'School Name'),
        ];
    }

    public function getSchoolSlider() 
    {
        return $this->hasMany(SchoolSlider::className(), ['school_id' => 'school_id']);
    }
}
