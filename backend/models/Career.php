<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%career}}".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $download_link
 * @property string $apply_link
 */
class Career extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%career}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description'], 'required'],
            [['content'], 'string'],
            [['id'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
            [['apply_link'], 'string', 'max' => 300],
            [['id'], 'unique'],
            [['download_link'], 'file', 'skipOnEmpty' => true, 
              'extensions' => ['pdf'], 'wrongExtension' => 'Only PDF files are allowed for {attribute}.',
              'wrongMimeType' => 'Only PDF files are allowed for {attribute}.',
              'mimeTypes' => ['application/pdf']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'download_link' => Yii::t('app', 'Download Link'),
            'apply_link' => Yii::t('app', 'Apply Link'),
        ];
    }
}
