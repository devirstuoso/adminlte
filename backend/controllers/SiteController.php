<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\mail\active\ContactUs;

// use kartik\password\StrengthValidator;




/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 
                                      'request-password-reset', 
                                      'error', 'reset-password'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 
                                      'index', 
                                      'dashboard',
                                      'error', 
                                      'home-slider',
                                      'insights',
                                      'user-details',
                                      'content-base',
                                      'content-schools',
                                      'contact'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   
        $model = new LoginForm();
        return $this->render('index', [
                'model' => $model,
            ]);
    }

    public function actionInsights()
    {    
        $session = Yii::$app->session;
        $session->open();
        return $this->render('insights', [ 'session' => $session,
            ]);
    }

    public function actionTextEdit()
    {    
        $session = Yii::$app->session;
        $session->open();
        return $this->render('textEdit', ['session' => $session,
            ]);
    }


    public function actionUserDetails()
    {    
        $session = Yii::$app->session;
        $session->open();
        return $this->render('userDetails', ['session' => $session,
            ]);
    }

    public function actionContentBase()
    {    
        $session = Yii::$app->session;
        $session->open();
        return $this->render('contentBase', ['session' => $session,
            ]);
    }

    public function actionContentSchools()
    {    
        $session = Yii::$app->session;
        $session->open();
        return $this->render('contentSchools', ['session' => $session,
            ]);
    }




    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {   
        $this->layout = 'main-login';
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $session = Yii::$app->session;
            $session->open();
            $session->set('username',$model->username);
            $session->close();

            $this->layout = 'main';
            return $this->render('index', [
                'model' => $model,
            ]);
        } else {
            $model->password = '';
            
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {  
        Yii::$app->user->logout();
        $session = Yii::$app->session;
        $session->open();
        $session->destroy();
        $session->close();
        $this->layout = 'blank';
        return $this->render('logout');
    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        $this->layout = 'main';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) { //Yii::$app->params['adminEmail'])
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                // $user = new LoginForm();
                // $this->layout = 'blank';
                return $this->redirect('site/login');
            //     return $this->render('login', [
            //     'model' => $user,
            // ]);
                
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }

            return $this->refresh();
        } else {
            $this->layout = 'blank';
            return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
        }

    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            $this->layout = 'blank';
            $user = new LoginForm();
            return $this->render('login', [
                'model' => $user,
            ]);

        }
        $this->layout = 'blank';
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }




}
