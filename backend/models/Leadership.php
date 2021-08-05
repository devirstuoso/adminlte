<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "leadership".
 *
 * @property string $id
 * @property string|null $leader_image
 * @property string $leader_name
 * @property string $leader_postition
 * @property string $leader_description
 */
class Leadership extends \yii2tech\filedb\ActiveRecord //change to \yii\db\ActiveRecord
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
        return 'LeadershipData';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'leader_name', 'leader_postition'], 'required'],
            [['id'], 'string', 'max' => 30],
            [['id'], 'unique'],
            [['leader_description'], 'string'],
            [['leader_image'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
                ],
            [['leader_name', 'leader_name_suf'], 'string', 'max' => 100],
            [['leader_postition'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'leader_image' => Yii::t('app', 'Leader\'s Image'),
            'leader_name' => Yii::t('app', 'Leader\'s Name'),
            'leader_name_suf' => Yii::t('app', 'Leader\'s Name Suffix'),
            'leader_postition' => Yii::t('app', 'Leader\'s Postition'),
            'leader_description' => Yii::t('app', 'Leader\'s Description'),
        ];
    }
}
