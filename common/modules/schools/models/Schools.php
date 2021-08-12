<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property string $id
 * @property string $school_id
 * @property string $school_name
 */
class Schools extends \yii\db\ActiveRecord
{
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
            [['id', 'school_id', 'school_name'], 'required'],
            [['id', 'school_id'], 'string', 'max' => 30],
            [['school_name'], 'string', 'max' => 300],
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
            'school_name' => Yii::t('app', 'School Name'),
        ];
    }

    public function getSchoolSlider() 
    {
        return $this->hasMany(SchoolSlider::className(), ['school_id' => 'school_id']);
    }
}
