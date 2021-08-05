<?php

namespace backend\controllers;

use Yii;
use backend\models\NewsEvents;
use backend\models\NewsEventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * NewsEventsController implements the CRUD actions for NewsEvents model.
 */
class NewsEventsController extends Controller
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
     * Lists all NewsEvents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsEventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // if (Yii::$app->request->post('hasEditable')) {
            
        //     $ne_type = Yii::$app->request->post('editableKey');
        // }

        return $this->render('../NewsEvents/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsEvents model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('../NewsEvents/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsEvents();

        if ($model->load(Yii::$app->request->post())) {
           
            $model->id = $this->keyValue();
            $this->uploadImage($model);
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
        return $this->render('../NewsEvents/create', [
            'model' => $model,
        ]);
    }


    // public function actionCreate()
    // {
    //     $model = new NewsEvents();

    //     if ($model->load(Yii::$app->request->post()) ) {
    //         $model->id = $this->keyValue();
    //         $this->uploadImage($model);
    //         if($model->save()){
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }
    //     }
    //     $this->layout = 'modal';
    //     return $this->render('../NewsEvents/create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing NewsEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_image = $model->ne_image;

        if ($model->load(Yii::$app->request->post())) {
            
            $this->uploadImage($model, $old_image);
            if($model->save()) {
            // if ($model->validate()) {
                // $model->save();
                Yii::$app->session->setFlash('success', 'Successfully saved the item.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
                return $this->redirect(['view', 'id' => $model->id]);

            }
           
        }

        $this->layout = 'modal';
        return $this->render('../NewsEvents/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsEvents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return NewsEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsEvents::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'ne_image');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';#.$model->slider_image->getExtension(); 
            $image_path = 'uploads/news_events/'.$image_name;
            $model->ne_image = $image_path;
            if($model->save()){
                $uploaded_image->saveAs($image_path);
            }
            
        }
        else{
           $model->ne_image = $old_image;
        }
        
        return true;

    }

    protected function keyValue()
    {   $last = NewsEvents::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "newsevents0001";
        } 
        $id = $last->id;
        return ++$id;
    }
}
