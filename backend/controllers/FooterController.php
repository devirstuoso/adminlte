<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\Footer;
use backend\models\FooterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

use backend\models\Model;
use backend\models\FooterContent;

/**
 * FooterController implements the CRUD actions for Leadership model.
 */
class FooterController extends Controller
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
        $searchModel = new FooterSearch();
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



    // public function actionCreate()
    // {   
    //    Yii::$app->rbac->role(['admin', 'create']);
    //
    //     $model = new Leadership();
    //     $model->id = $this->keyValue();

    //     if ($model->load(Yii::$app->request->post())) {
    //         $this->uploadImage($model);
    //         if($model->validate()) {
    //             $model->save(false);
    //             Yii::$app->session->setFlash('success', 'Successfully saved the item.');
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //         else{
    //             Yii::$app->session->setFlash('error', 'Unable to save the item.');
    //             return $this->redirect(['index']);

    //         }
    //     }
    //     $this->layout = 'modal';
    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

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
        $modelsContent = $model->footerContent;
        $old_image = $model->logo;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsContent, 'id', 'id');
            $modelsContent = Model::createMultiple(FooterContent::classname());//, $modelsContent);
            Model::loadMultiple($modelsContent, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsContent, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsContent) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $this->uploadImage($model, $old_image);
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            FooterContent::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsContent as $modelContent) {
                            $modelContent->id = $this->keyValue(FooterContent::className(), $model->id);
                            $modelContent->content_id = $model->id;
                            if (! ($flag = $modelContent->save(false))) {
                                Yii::$app->session->setFlash('error', 'Unable to save the item.');
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
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
    return $this->render('update', [
            'model' => $model,
            'modelsContent' => (empty($modelsContent)) ? [new FooterContent] : $modelsContent
        ]);
    }


    /**
     * Deletes an existing Leadership model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     Yii::$app->rbac->role(['admin', 'delete']);

    //     $this->findModel($id)->delete();
    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Leadership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Leadership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Footer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }   
    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'logo');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';
            $image_path = 'uploads/footer/'.$image_name;
            $model->logo = $image_path;
            if($model->save()){
                $uploaded_image->saveAs($image_path);
            }
        }
        else{
           $model->logo = $old_image;
        }
        return true;
    }

    protected function keyValue($class, $footer_id=null)
    {   $last = $class::find()->where(['content_id' => $footer_id])->orderBy(['id' => SORT_DESC])->one();
         if(is_null($last) || $last->id == 'footer0000')
            { return 'footer0001';
            } 
        $id = $last->id;
        return ++$id;
    }


}
