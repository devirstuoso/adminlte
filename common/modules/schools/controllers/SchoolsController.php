<?php

namespace common\modules\schools\controllers;

use Yii;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use yii\web\UploadedFile;


use common\modules\schools\models\Schools;
use common\modules\schools\models\SchoolSlider;
use common\modules\schools\models\SchoolsSearch;
/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class SchoolsController extends Controller
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
     * Lists all Schools models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schools model.
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
     * Creates a new Schools model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelSchool = new Schools;
        $modelsSlider = [new SchoolSlider];

        if ($modelSchool->load(Yii::$app->request->post())) {

            $modelSchool->id = $this->keyValue();

            $modelsSlider = Model::createMultiple(SchoolSlider::classname());
            Model::loadMultiple($modelsSlider, Yii::$app->request->post());

            // validate all models
            $valid = $modelSchool->validate();
            $valid = Model::validateMultiple($modelsSlider) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $modelSchool->save(true)) {
                        foreach ($modelsSlider as $modelSlider) {
                            // $modelSlider->id = $this->sliderKeyValue();
                            $modelSlider->school_id = $modelSchool->school_id;
                            // $this->uploadImage($modelSlider);
                            if (! ($flag = $modelSlider->save(true))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Successfully saved the item.');
                        return $this->redirect(['view', 'id' => $modelSchool->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
                return $this->redirect(['index']);
            }  
        }

        $this->layout = 'modal';
        return $this->render('create', [
            'modelSchool' => $modelSchool,
            'modelsSlider' => (empty($modelsSlider)) ? [new SchoolSlider()] : $modelsSlider
        ]);
    }

    /**
     * Updates an existing Schools model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       if ($model->load(Yii::$app->request->post())) {
   
            // $this->uploadImage($model, $old_image);
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
     * Deletes an existing Schools model.
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
     * Finds the Schools model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Schools the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schools::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'image');//\yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]img");
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png'; 
            $image_path = $image_name;
            $model->image = $image_path;
            if($model->save(true)){
                $uploaded_image->saveAs($image_path);
            }
        }
        else{
           $model->slider_image = $old_image;
        }
        return true;
    }

    protected function keyValue()
    {   $last = Schools::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "school0001";
        } 
        $id = $last->id;
        return ++$id;
    }

    protected function sliderKeyValue()
    {   $last = SchoolSlider::find()->orderBy(['id' => SORT_DESC])->one();
        if(empty($last))
        { 
            return "slider0001";
        } 
        $id = $last->id;
        return ++$id;
    }
}
