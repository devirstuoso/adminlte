<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

use backend\models\HomeSlider;
use backend\models\UpdatesPanel;
use backend\models\UpdatesPanelContent;
use backend\models\NewsEvents;
use backend\models\Leadership;
use backend\models\ContactForm;
use backend\models\GovCouncil;
use backend\models\Career;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {   $slider = new HomeSlider();
        $update = new UpdatesPanel();
        $contactform = new ContactForm();
        $news = new NewsEvents();

        if ($contactform->load(Yii::$app->request->post())) {
            $contactform->id = $this::cf_keyValue();
            if ($contactform->save ()) {
                $contactform->sendEmail();
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        }

        return $this->render('index', ['slider' => $slider, 
                                       'update' => $update, 
                                       'newsevents' => $news, 
                                       'contactform' => $contactform
                                   ]);
    }




    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionReport()
    {
        $filePath = Yii::getAlias('@common').'/data/files/Annual-Self-Report-21.pdf';

        return Yii::$app->response->sendFile($filePath, 'Annual Self Report of year 2021' , ['inline' => true]);
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
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

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionUpdatesPage($id)
    {
        $updateContent = new UpdatesPanelContent();

        return $this->render('updatesPage', [ 'update' => $this->findModel($id), 'update_contents' => $updateContent ]);
    }


    public function actionNewsEventsPage()
    {
        $newsevents = new NewsEvents();

        return $this->render('newseventsPage', ['newsevents' => $newsevents]);
    }

    public function actionLeadership()
    {
        $leaders = new Leadership();
        // $leaders = $this->findLeadershipModel();

        return $this->render('leadership', ['leaders' => $leaders]);
    }

    public function actionLeadershipDetailed($id)
    {
        $leader = $this->findLeaderModel($id);

        return $this->render('leadership-2', ['leader' => $leader]);
    }

    public function actionSecretariat()
    {   
        // $staffs = $this->findSecrModels();
        $staffs = new Leadership();
        return $this->render('secretariat', ['staffs' => $staffs]);
    }

    public function actionGovCouncil()
    {
        $govcouncil = new GovCouncil();

        return $this->render('governingCouncil', ['govcouncil' => $govcouncil]);
    }


    // Career Page
    public function actionCareer()
    {
        $careers = $this->findCareerModels();
        return $this->render('career', ['careers' => $careers]);
    }
    public function actionCareer1($id)
    {
        $career = $this->findCareerModel($id);
        return $this->render('career-1', ['career' => $career]);
    }

    public function actionCareer2($id)
    {
        $career = $this->findCareerModel($id);
        return $this->render('career-2', ['career' => $career]);
    }

    public function actionDownloadCareer($id)
    {
        $career = $this->findCareerModel($id);
        $filePath = Yii::getAlias('@backend/web/').$career->download_link;
        return Yii::$app->response->sendFile($filePath, 'Advertisement.pdf', [ 'mimeType' => 'application/pdf']);

    }

    // End of Career Page


    public function actionSchools()
    {
        return $this->render('schools');
    }

    public function actionComingSoon()
    {
        return $this->render('comsoon');
    }







    
    protected function findModel($id)
    {
        if (($model = UpdatesPanel::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }

    protected function findLeadershipModel()
    {
        if (($model = Leadership::find()->all()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }

    protected function findLeaderModel($id)
    {
        if (($model = Leadership::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }

    protected function findSecrModels()
    {
        if (($model = Leadership::find()->all()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }

    protected function findCareerModel($id)
    {
        if (($model = Career::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }

        protected function findCareerModels()
    {
        if (($models = Career::find()->all()) !== null) {
            return $models;
        }
        throw new NotFoundHttpException('The requested page doesn\'t exist.' );
    }
    
    protected function cf_keyValue()
    {   $last = ContactForm::find()->orderBy(['id' => SORT_DESC])->one();

        if ($last->id == 'enquiry') {
        return 'enquiry000001';   
        }
        $id = $last->id;
        return ++$id;
    }
}
