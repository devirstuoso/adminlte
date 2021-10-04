<?php

namespace backend\controllers;

use Yii;
use backend\models\ContactForm;
use backend\models\ContactFormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactFormController implements the CRUD actions for ContactForm model.
 */
class ContactFormController extends Controller
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
     * Lists all ContactForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setPagination(['pageSize' => 10]); 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactForm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {   
    //    Yii::$app->rbac->role(['admin', 'create']);

    //     $model = new ContactForm();
    //     $model->id = $this->keyValue();

    //     if ($model->load(Yii::$app->request->post())) {
    //         if($model->validate()) {
    //             $model->save(false);
    //             Yii::$app->session->setFlash('success', 'Successfully saved the item.');
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //         else{
    //             Yii::$app->session->setFlash('error', 'Unable to save the item.');
    //             return $this->redirect(['index']);

    //         }
    //     }
    //     // $this->layout = 'modal';
    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing ContactForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($id)
    // {
    //    Yii::$app->rbac->role(['admin', 'create']);
    // 
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post())) {
    //         if ($model->validate()) {
    //          $model->save();
    //          Yii::$app->session->setFlash('success', 'Successfully saved the item.');
    //      }
    //      else{
    //         Yii::$app->session->setFlash('error', 'Unable to save the item.'); 
    //     }

    //     return $this->redirect(['view', 'id' => $model->id]);
    // }
    // // $this->layout = 'modal';
    // return $this->render('update', [
    //     'model' => $model,
    // ]);
    // }
    /**
     * Deletes an existing ContactForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->rbac->role(['admin', 'delete']);

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function keyValue()
    {   $last = ContactForm::find()->orderBy(['id' => SORT_DESC])->one();

        if ($last->id == 'enquiry') {
        return 'enquiry000001';   
        }
        $id = $last->id;
        return ++$id;
    }
}
