<?php
namespace backend\models;

use Yii;
// use yii\base\Model;
use common\models\User;
use common\models\AuthAssignment;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * Signup form
 */
class Signup extends ActiveRecord
{
    public $username;
    public $email;
    public $password;
    public $auth;
    public $image;
    public $status;
    // public static function tableName()
    // {
    //     return '{{%signup}}';
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 
            'when'=>function($model) { return sizeof(User::find()->where(['<>','status',User::STATUS_DELETED])->andWhere(['username'=>$model->username])->all())!=0;}, 
            'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 
            'when'=>function($model) { return sizeof(User::find()->where(['<>','status',User::STATUS_DELETED])->andWhere(['email'=>$model->email])->all())!=0;}, 
            'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            
            ['auth', 'trim'],
            ['status', 'trim'],
            [['image'], 'image', 
            'skipOnEmpty'=>true,
            'extensions' => 'png, jpg, jpeg, gif',
            'mimeTypes' => 'image/jpeg, image/png, image/gif',
            'minWidth' => 200, 'maxWidth' => 1000,
            'minHeight' => 200, 'maxHeight' => 1000,
            
              ],
            // ['auth', 'string', 'max' => 100],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $image = UploadedFile::getInstance($this, 'image');
        if ($image) {
            $user->profile = $image;
            $image->saveAs('uploads/users/'.$image);
        }
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if ($user->save()) {
            return $this->auth($this->auth, $user) && $this->sendEmail($user);
        } else {
            return false;
        }
    }

    public function update_status($user)
    {
        // if (!$this->validate()) {
        //     return null;
        // }

        $id = $user->id;
        // $user->username = $this->username;
        // $user->email = $this->email;
        $user->status = $this->status;
        $image = UploadedFile::getInstance($this, 'image');
        if ($image) {
            $user->profile = $image;
            $image->saveAs('uploads/users/'.$image);
        }
       
        if ($user->save()) {
            AuthAssignment::deleteAll(['user_id' => $id]);
            return $this->auth($this->auth, $user);
        } else {
            return false;
        }
    }

    /**
     * Assignment of user accesses.
     *
     * @return bool whether the access is set or not
     */
    protected function auth($access, $user)
    {
        if (empty($access)) {
            return true;
        }
        foreach ($access as $key => $value) {
            $auth = new AuthAssignment();
            $auth->item_name = $value;
            $auth->user_id = (string) $user->id;
            $auth->status = $user->status;
            if(!$auth->save()){
                return false;
            }
        }
        return  true;
    }
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ''])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
    
}
