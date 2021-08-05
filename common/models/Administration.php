<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "administration".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $user_name
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $email
 */
class Administration extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administration';
    }

    /** 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name'], 'string', 'max' => 15],
            [['last_name'], 'string', 'max' => 20],
            [['user_name', 'password'], 'string', 'min' => 5, 'max' => 30],
            [['auth_key'], 'string', 'max' => 50],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_name' => 'User Name',
            'password' => 'Password',
            'auth_key' => 'Authentication Key',
            'email' => 'Email Address'
        ];
    }

    public function getAuthKey(){
        return $this->auth_key;
    }

    public function getId(){
        return $this->id;
    }

    public function validateAuthKey($authKey){
        return $this->auth_key === $auth_key;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type=null){
        throw new \yii\base\NotSupportedException;
    }

    public static function findByUsername($username){
        return self::findOne(['user_name'=> $username]);
    }

    public function validatePassword($password){
        return $this->password === $password;
    }

    public function setPassword($password){
        return $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

   public static function findByPasswordResetToken($token){
        return self::findOne([
            'verification_token' => $token
        ]);
   }


}
