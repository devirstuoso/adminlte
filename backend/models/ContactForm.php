<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact_form".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class ContactForm extends \yii2tech\filedb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function fileName()
    {
        return 'ContactForm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['message'], 'string'],
            [['name', 'email'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 5000],
            [['email'], 'email', 'message' => 'Please input a valid email, eg: ioe@mail.com'],
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
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

      public function sendEmail()
    {

     return Yii::$app
            ->mailer
            ->compose(
                ['user' => $this->name],['Thank you {user} for contacting us']
            )
            ->setFrom([Yii::$app->params['supportEmail'] => ''])
            ->setTo($this->email)
            ->setSubject('Subscribed for updates @ ' . Yii::$app->name)
            ->send();
    }


}
