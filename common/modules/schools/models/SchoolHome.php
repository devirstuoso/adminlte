<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "school_home".
 *
 * @property string $id
 * @property string $school_id
 * @property string $content
 * @property int $sort_order
 */
class SchoolHome extends \yii\db\ActiveRecord
{
    const ID_PREFIX = 'schoolshom';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%school_home}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'content', 'sort_order'], 'required'],
            [['sort_order'], 'integer'],
            [['id', 'school_id'], 'string', 'max' => 30],
            [['content'], 'string', 'max' => 10000],
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
            'school_id' => Yii::t('app', 'School ID'),
            'content' => Yii::t('app', 'Content'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }
}
