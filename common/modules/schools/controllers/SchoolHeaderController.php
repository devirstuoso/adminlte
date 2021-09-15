<?php

namespace common\modules\schools\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\modules\schools\models\SchoolHeader;
use common\modules\schools\models\SchoolHeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;


// use backend\models\Model;
// use backend\models\SchoolSchoolHeaderContent;

// use common\modules\schools\models\Schools;


/**
 * SchoolHeaderController implements the CRUD actions for SchoolHeader model.
 */
class SchoolHeaderController extends Controller
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
     * Lists all SchoolHeader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolHeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolHeader model.
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
     * Creates a new SchoolHeader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */



    public function actionCreate()
    {   
        $model = new SchoolHeader;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue(SchoolHeader::classname()); //comment this for int id

            // validate all models
            $valid = $model->validate();

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {

                    if ($model->save()) {
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Successfully saved the item.');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
            }
        }
        $this->layout = 'modal';
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing SchoolHeader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) 
    {
        $model = $this->findModel($id);

        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            // validate all models
            $valid = $model->validate();

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    if ($model->save()) {
                        $transaction->commit();
                         Yii::$app->session->setFlash('success', 'Successfully updated the item.');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            else{
                Yii::$app->session->setFlash('error', 'Unable to save the item.');
            }
        }
        $this->layout = 'modal';
    return $this->render('update', [
            'model' => $model,
        ]);
    }






    /**
     * Deletes an existing SchoolHeader model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if ($id <> 'header0000') {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        else {
        Yii::$app->session->setFlash('error', 'This Item Can\'t be deleted.');
        return $this->redirect(['index']);
        }
    }

    /**
     * Finds the SchoolHeader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SchoolHeader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolHeader::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }   

    protected function keyValue($class, $id = Null)
    {   
        $last = $class::find()->orderBy(['id' => SORT_DESC])->one();
            if(is_null($last) || $last->id == 'header0000')
            { return 'header0001';
            } 
            $id = $last->id;
            return ++$id;
    }


}
