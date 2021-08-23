<?php

namespace common\modules\schools\models;

use Yii;

/**
 * This is the model class for table "school_gov_council".
 *
 * @property string $id
 * @property string $name
 * @property string $position
 * @property string $sort_order
 */
class SchoolCommittee extends \yii\db\ActiveRecord
{   
    const ID_PREFIX = 'schoolscom';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_committee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'school_id', 'name', 'position'], 'required'],
            [['id', 'school_id'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 300],
            [['position'], 'string', 'max' => 500],
            [['sort_order'], 'string', 'max' => 10],
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
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }
}
