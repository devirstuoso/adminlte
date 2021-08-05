<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "updates_panel".
 *
 * @property string $id
 * @property string $updates_title
 * @property string $updates_link
 * @property int $updates_hide
 */
class UpdatesPanel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'updates_panel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'updates_title'], 'required'],
            [['updates_hide'], 'integer'],
            [['id'], 'string', 'max' => 30],
            [['updates_title', 'updates_link'], 'string', 'max' => 200],
            [['id'], 'unique'],
            [['updates_link'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'updates_title' => 'Updates Title',
            'updates_link' => 'Updates Link',
            'updates_hide' => 'Hide',
        ];
    }

    public function getUpdatesContent() 
    {
        return $this->hasMany(UpdatesPanelContent::className(), ['update_id' => 'id']);
    }

    
}
