<?php

namespace backend\controllers;

use Yii;
use backend\models\UpdatesPanelContent;
use backend\models\UpdatesPanelContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UpdatesPanelContentController implements the CRUD actions for UpdatesPanelContent model.
 */
class UpdatesPanelContentController extends Controller
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
     * Lists all UpdatesPanelContent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UpdatesPanelContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('../UpdatesPanelContent/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UpdatesPanelContent model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('../UpdatesPanelContent/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UpdatesPanelContent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($update_id)
    {
        $model = new UpdatesPanelContent();

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue();
            $model->update_id = $update_id;
            $this->uploadImage($model);
            $model->save();
            return $this->redirect(['updates-panel/view', 'id' => $model->update_id]);
        }

        $this->layout = 'modal';
        return $this->render('../UpdatesPanelContent/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UpdatesPanelContent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_image = $model->updates_content_picture;

        if ($model->load(Yii::$app->request->post())) {
            $this->uploadImage($model, $old_image);
            $model->save();
            return $this->redirect(['updates-panel/view', 'id' => $model->update_id]);
        }

        $this->layout = 'modal';
        return $this->render('../UpdatesPanelContent/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UpdatesPanelContent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $back_id)
    {
        $model = $this->findModel($id);
        if(file_exists($model->updates_content_picture)){
            unlink($model->updates_content_picture);
            }
        $model->delete();
        return $this->redirect(['updates-panel/view', 'id' => $back_id]);
        #return $this->redirect(['index']);
    }

    /**
     * Finds the UpdatesPanelContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UpdatesPanelContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UpdatesPanelContent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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
    {   $last = UpdatesPanelContent::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "updatesContent0001";
        } 
        $id = $last->id;
        return ++$id;
    }
}
