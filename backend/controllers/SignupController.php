<?php

namespace backend\controllers;

use Yii;
use backend\models\Signup;
use common\models\User;
use common\models\UserSearch;
use common\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * SignupController implements the CRUD actions for Signup model.
 */
class SignupController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Signup models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->rbac->role('admin');

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Signup model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::$app->rbac->role('admin');

        return $this->render('view', [
            'model' => $this->findUserModel($id),
            'auths' => $this->findAuthModels($id),
        ]);
    }

    /**
     * Creates a new Signup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->rbac->role('admin');

        $model = new Signup();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                $id = User::find()->where(['username'=> $model->username])->one()->id;
                Yii::$app->session->setFlash('success', 'User saved successfully.');// Please check your inbox for verification email.');
                return $this->redirect(['view', 'id' => $id]);
            } else {
                Yii::$app->session->setFlash('error', 'There is some problem with given data');
                // return $this->redirect(['index']);
            }
        }

        $this->layout = 'modal';
        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing Signup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role('admin');

        // if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return ActiveForm::validate($model);
        // }
        $model = new Signup();
        $user = $this->findUserModel($id);
        $auths = $this->findAuthModels($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if ($model->update_status($user)) {
                Yii::$app->session->setFlash('success', 'User updated successfully.');// Please check your inbox for verification email.');
                return $this->redirect(['view', 'id' => $id]);
            }
            else {
                Yii::$app->session->setFlash('error', 'There is some problem with given data');
                return $this->redirect(['index']);
            }
        }
        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model, 'user' => $user, 'auths' => $auths,
        ]);
    }

    /**
     * Deletes an existing Signup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->rbac->role('admin');

        $model = $this->findUserModel($id);//->delete();
        $auths = $this->findAuthModels($id);
        $model->status = 0;
        $model->save();
        foreach ($auths as $auth) {
           $auth->status = 0;
           $auth->save();
        }
        
        return $this->redirect(['index']);
    }

    public function actionDeleteP()
    {
        Yii::$app->rbac->role('admin');
        $password = isset($_POST['password']) ? $_POST['password']  : ''; //password from prompt
        $user = User::find()->where(['username'=> Yii::$app->user->identity->username])->one();
        $admin_password = $user->password_hash; //password of user
        if (!Yii::$app->security->validatePassword($password,$admin_password)) {
            Yii::$app->session->setFlash('error', 'incorrect Password.');
        } else {
            User::deleteAll(['status' => 0]);
            AuthAssignment::deleteAll(['status' => 0]);
            Yii::$app->session->setFlash('success', 'Users(deleted) Removed Successfully.');
        }
        return 0;
       
    }

    /**
     * Finds the Signup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Signup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findAuthModels($id)
    {
        return AuthAssignment::findAll(['user_id' => (string)$id]);
    }
}
