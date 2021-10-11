<?php

namespace common\modules\schools\controllers;

use Yii;
use common\modules\schools\models\SchoolOffice;
use common\modules\schools\models\SchoolOfficeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * SchoolOfficeController implements the CRUD actions for SchoolOffice model.
 */
class SchoolOfficeController extends Controller
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
     * Lists all SchoolOffice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolOfficeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolOffice model.
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
     * Creates a new SchoolOffice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->rbac->role('school-create');

        $model = new SchoolOffice();
        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue(SchoolOffice::classname());
            $model->photograph = $this->uploadImage($model, 'photograph');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $this->layout = 'modal';
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SchoolOffice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role('school-update');

        $model = $this->findModel($id);
        $old_image =$model->photograph;
        if ($model->load(Yii::$app->request->post())) {
            $model->photograph = $this->uploadImage($model, 'photograph', $old_image);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SchoolOffice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->rbac->role('school-delete');

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SchoolOffice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SchoolOffice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolOffice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function keyValue($class)
    {   
        $id = $class::find()->select(['id'=>'MAX(`id`)'])->one()->id;
            if(empty($id))
            { return $class::ID_PREFIX.'0001';
            } 
            return ++$id;
    }

    protected function uploadImage($model, $attribute , $old_image = null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, $attribute);
        $image_name = $model->id.'.png';#.$model->slider_image->getExtension(); 
        $image_path =  'uploads/schooloffice/'.$image_name;
        $cond =  $model->save() && !is_null($uploaded_image);
        if($cond){
            $uploaded_image->saveAs($image_path);
            return $image_path;
        }
        else{
            return $old_image;
        }
        
    }
}
