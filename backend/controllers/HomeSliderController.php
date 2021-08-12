<?php

namespace backend\controllers;

use Yii;
use backend\models\HomeSlider;
use backend\models\HomeSliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * HomeSliderController implements the CRUD actions for HomeSlider model.
 */
class HomeSliderController extends Controller
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
     * Lists all HomeSlider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HomeSliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HomeSlider model.
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
     * Creates a new HomeSlider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HomeSlider();

        #$model->scenario = 'create-photo-upload';

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
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HomeSlider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_image = $model->slider_image;

        #$model->scenario = 'update-photo-upload';

        if ($model->load(Yii::$app->request->post())) {
   
            $this->uploadImage($model, $old_image);
            
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
     * Deletes an existing HomeSlider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(file_exists($model->slider_image)){
            unlink($model->slider_image);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HomeSlider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HomeSlider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HomeSlider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'slider_image');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';#.$model->slider_image->getExtension(); 
            $image_path = 'uploads/slider/'.$image_name;
            $model->slider_image = $image_path;
            if($model->save()){
                $uploaded_image->saveAs($image_path);
            }
        }
        else{
           $model->slider_image = $old_image;
        }
        return true;
    }

    protected function keyValue()
    {   $last = HomeSlider::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "slider0001";
        } 
        $id = $last->id;
        return ++$id;
    }

}
