<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "updates_panel".
 *
 * @property string $id
 * @property string $title
 * @property string $link
 * @property int $hide
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
            [['id', 'title'], 'required'],
            [['hide'], 'integer'],
            [['id'], 'string', 'max' => 30],
            [['title', 'link'], 'string', 'max' => 200],
            [['id'], 'unique'],
            [['link'], 'default', 'value' => null],
            [['content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Updates Title',
            'link' => 'Updates Link',
            'hide' => 'Hide',
            'content' => 'Page Content'
        ];
    }

    public function getUpdatesContent() 
    {
        return $this->hasMany(UpdatesPanelContent::className(), ['update_id' => 'id']);
    }

    
}
