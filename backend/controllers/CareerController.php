<?php

namespace backend\controllers;

use Yii;
use backend\models\Career;
use backend\models\CareerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CareerController implements the CRUD actions for Career model.
 */
class CareerController extends Controller
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
     * Lists all Career models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CareerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Career model.
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
     * Creates a new Career model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->rbac->role(['admin', 'create']);

        $model = new Career();
        if ($model->load(Yii::$app->request->post())) {
            
            $model->id = $this->keyValue();
            $this->uploadFile($model);
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
     * Updates an existing Career model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role(['admin', 'update']);

        $model = $this->findModel($id);
        $old_file = $model->download_link;

        if ($model->load(Yii::$app->request->post())) {
   
            $this->uploadFile($model, $old_file);
            
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
     * Deletes an existing Career model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->rbac->role(['admin', 'delete']);

        $del_model = $this->findModel($id);
        unlink($del_model->download_link);
        $del_model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Career model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Career the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Career::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function uploadFile($model, $old_file = Null)
    {   
        $uploaded_file = UploadedFile::getInstance($model, 'download_link');
        if(isset($uploaded_file)){
            if (!$model->isNewRecord) {
                unlink($old_file);
            }
            $file_name = $uploaded_file;
            $file_path = 'uploads/files/'.$model->id.'_'.$file_name;
            $model->download_link = $file_path;
            if($model->save()){
                $uploaded_file->saveAs($file_path);
            }
        }
        else{
           $model->download_link = $old_file;
        }
        return true;
    }

    protected function keyValue()
    {   $last = Career::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { return "career0001";
        } 
        $id = $last->id;
        return ++$id;
    }

   
}
