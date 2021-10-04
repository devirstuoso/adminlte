<?php

namespace backend\controllers;

use Yii;
use backend\models\GovCouncil;
use backend\models\GovCouncilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GovCouncilController implements the CRUD actions for GovCouncil model.
 */
class GovCouncilController extends Controller
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
     * Lists all GovCouncil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GovCouncilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GovCouncil model.
     * @param string $id
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
     * Creates a new GovCouncil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->rbac->role(['admin', 'create']);

        $model = new GovCouncil();

        if ($model->load(Yii::$app->request->post())) {

            $model->id = $this->keyValue();
            // $this->uploadImage($model);
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Successfully saved the item.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
                return $this->redirect(['index']);
            }
            
        }
        $this->layout = 'modal';
        return $this->render('create', [
            'model' => $model,
        ]);
    }
           
    /**
     * Updates an existing GovCouncil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role(['admin', 'update']);

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Successfully saved the item.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
                return $this->redirect(['view', 'id' => $model->id]);

            }
        }
        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GovCouncil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
     * Finds the GovCouncil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GovCouncil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GovCouncil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function keyValue()
    {   $last = GovCouncil::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "govcouncil0001";
        } 
        $id = $last->id;
        return ++$id;
    }
}
