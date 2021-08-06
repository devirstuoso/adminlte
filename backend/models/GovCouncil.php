<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gov_council".
 *
 * @property string $id
 * @property string $name
 * @property string $designation
 * @property string $image
 */
class GovCouncil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gov_council';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'designation'], 'required'],
            [['id'], 'string', 'max' => 30],
            [['name', 'image'], 'string', 'max' => 100],
            [['designation'], 'string', 'max' => 300],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'designation' => Yii::t('app', 'Designation'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
