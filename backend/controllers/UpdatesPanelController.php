<?php

namespace backend\controllers;

use Yii;
use backend\models\UpdatesPanel;
use backend\models\UpdatesPanelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\UpdatesPanelContent;
use yii\web\UploadedFile;


/**
 * UpdatesPanelController implements the CRUD actions for UpdatesPanel model.
 */
class UpdatesPanelController extends Controller
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
     * Lists all UpdatesPanel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UpdatesPanelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UpdatesPanel model.
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
     * Creates a new UpdatesPanel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UpdatesPanel();
        $content_model = new UpdatesPanelContent();

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue();
            $model->save();

            if ($content_model->load(Yii::$app->request->post())) {
                $content_model->id = $this->contentKeyValue();
                $content_model->update_id = $model->id;
                $this->uploadImage($content_model);
                $content_model->save();
            }

            return $this->redirect(['updates-panel/view', 'id' => $model->id]);
        }
        $this->layout = 'modal';
        return $this->render('create', [
            'model' => $model, 'content_model' => $content_model,
        ]);
    }

    /**
     * Updates an existing UpdatesPanel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            foreach ($model->updatesContent as $content){
                $old_image = $content->updates_content_picture;
                if ($content->load(Yii::$app->request->post())) {
                    $this->uploadImage($content, $old_image);
                    $content->save();
                    }
                }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model,                                                                                                                                                                                       
        ]);
    }

    /**
     * Deletes an existing UpdatesPanel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        foreach ($model->updatesContent as $content){
            if(file_exists($content->updates_content_picture)){
            unlink($content->updates_content_picture);
            }
            $content->delete();
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UpdatesPanel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UpdatesPanel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UpdatesPanel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'updates_content_picture');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';#.$model->slider_image->getExtension(); 
            $image_path = 'uploads/updates_content/'.$image_name;
            $model->updates_content_picture = $image_path;
            if($model->save()){
                $uploaded_image->saveAs($image_path);
            }
            
        }
        else{
           $model->updates_content_picture = $old_image;
        }
        
        return true;

    }

    protected function keyValue()
    {   $last = UpdatesPanel::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "updates0001";
        } 
        $id = $last->id;
        return ++$id;
    }

    protected function contentKeyValue()
    {   $last = UpdatesPanelContent::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "updatesContent0001";
        } 
        $id = $last->id;
        return ++$id;
    }

}
