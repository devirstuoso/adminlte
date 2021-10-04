<?php

namespace backend\controllers;

use Yii;
use backend\models\Leadership;
use backend\models\LeadershipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * LeadershipController implements the CRUD actions for Leadership model.
 */
class LeadershipController extends Controller
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
     * Lists all Leadership models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeadershipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leadership model.
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
     * Creates a new Leadership model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */



    public function actionCreate()
    {   
        Yii::$app->rbac->role(['admin', 'create']);

        $model = new Leadership();
        $model->id = $this->keyValue();

        if ($model->load(Yii::$app->request->post())) {
            $this->uploadImage($model);
            if($model->validate()) {
                $model->save(false);
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
     * Updates an existing Leadership model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role(['admin', 'update']);

        $model = $this->findModel($id);
        $old_image = $model->leader_image;

        if ($model->load(Yii::$app->request->post())) {
            $this->uploadImage($model, $old_image);
            if ($model->validate()) {
               $model->save();
                Yii::$app->session->setFlash('success', 'Successfully saved the item.');
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.'); 
            }
                
            return $this->redirect(['view', 'id' => $model->id]);
            }
        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Leadership model.
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
     * Finds the Leadership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Leadership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leadership::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }   
    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'leader_image');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';
            $image_path = 'uploads/leaders/'.$image_name;
            $model->leader_image = $image_path;
            if($model->save()){
                $uploaded_image->saveAs($image_path);
            }
        }
        else{
           $model->leader_image = $old_image;
        }
        return true;
    }

    protected function keyValue()
    {   $last = Leadership::find()->orderBy(['id' => SORT_DESC])->one();
        // if(empty($last))
        // { 
        //     return "leader0001";
        // } 

        if ($last->id == 'leader') {
        return 'leader0001';   
        }
        $id = $last->id;
        return ++$id;
    }


}
