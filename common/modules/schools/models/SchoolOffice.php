<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "{{%school_office}}".
 *
 * @property string $id
 * @property string $name
 * @property string $position
 * @property string $description
 */
class SchoolOffice extends \yii\db\ActiveRecord
{
    const ID_PREFIX = 'schoolsoff';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%school_office}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'school_id', 'position'], 'required'],
            [['id', 'school_id'], 'string', 'max' => 30],
            [['name', 'position'], 'string', 'max' => 300],
            [['description'], 'string', 'max' => 10000],
            [['id'], 'unique'],
            [['photograph'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
            ],
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
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'photograph' => Yii::t('app', 'Photograph'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
