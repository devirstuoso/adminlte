<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "updates_panel_content".
 *
 * @property string $id
 * @property string $update_id
 * @property string $updates_content_picture
 * @property string $updates_content_paragraph
 *
 * @property UpdatesPanel $update
 */
class UpdatesPanelContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'updates_panel_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'update_id'], 'required'],
            [['updates_content_paragraph'], 'string'],
            [['id', 'update_id'], 'string', 'max' => 30],
            [['updates_content_picture'], 'file', 
              'skipOnEmpty'=>true,
              'extensions' => 'png, jpg, jpeg, gif',
              'mimeTypes' => 'image/jpeg, image/png, image/gif',
              ],
            [['id'], 'unique'],
            [['update_id'], 'exist', 'skipOnError' => true, 'targetClass' => UpdatesPanel::className(), 'targetAttribute' => ['update_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'update_id' => 'Update ID',
            'updates_content_picture' => 'Updates Content Picture',
            'updates_content_paragraph' => 'Updates Content Paragraph',
        ];
    }

    /**
     * Gets query for [[Update]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatesPanel()
    {
        return $this->hasOne(UpdatesPanel::className(), ['id' => 'update_id']);
    }
}
