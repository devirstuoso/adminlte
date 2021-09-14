<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Header;
use backend\models\HeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

use backend\models\Model;
use backend\models\HeaderContent;

use common\modules\schools\models\Schools;


/**
 * HeaderController implements the CRUD actions for Header model.
 */
class HeaderController extends Controller
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
     * Lists all Header models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Header model.
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
     * Creates a new Header model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */



    public function actionCreate()
    {   
        $model = new Header;
        $modelsContent = [ new HeaderContent ];

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue(Header::classname()); //comment this for int id

            $modelsContent = Model::createMultiple(HeaderContent::classname());
            Model::loadMultiple($modelsContent, Yii::$app->request->post());

            foreach($modelsContent as $index => $modelContent){
                $modelContent->id = $this->keyValue(HeaderContent::className(), $model->id);
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsContent) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                $this->uploadImage($model);

                try {
                    if ($flag = $model->save()) {

                        // if(strcasecmp(strtok($model->nav_link, '#'), 'inherit') != 0) {
                        if(! isset($_POST['inherit'])) {
                            foreach ($modelsContent as $modelContent) {
                                $modelContent->id = $this->keyValue(HeaderContent::classname(), $model->id);
                                $modelContent->nav_id = $model->id;
                                if (! ($flag = $modelContent->save())) {
                                    Yii::$app->session->setFlash('error', 'Unable to save the item.');
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                       else {
                        $className = $_POST['header-inherit_class_name'];
                        // $obj = \common\modules\schools\models\Schools::find()->all();
                        $objects = $className::find()->all();

                            foreach ($objects as $object) {
                                 $modelContent = new HeaderContent();
                                 $modelContent->id = $this->keyValue(HeaderContent::classname(), $model->id);
                                 $modelContent->nav_id = $model->id;
                                 $modelContent->nav_sub_item = 'Delhi School of '.$object->school_name; //need correction in model and all files school_name->title
                                 // $modelContent->nav_sub_link = '';
                                 $controlPath = strtok($_POST['header-inherit_control_path'], '#');
                                 $controlId = strtok('');
                                 $modelContent->nav_sub_link = Url::to("index.php?r={$controlPath}&id={$object->{$controlId}}");
                                 if (! ($flag = $modelContent->save())) {
                                    Yii::$app->session->setFlash('error', 'Unable to save the item.');

                                    $transaction->rollBack();
                                    break;
                                }
                            
                            // Url::to(['/schools/schoolf', 'id' => $school->school_id])
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
        return $this->render('create', [
            'model' => $model,
            'modelsContent' => (empty($modelsContent)) ? [new HeaderContent] : $modelsContent,
        ]);

    }

    /**
     * Updates an existing Header model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) 
    {
        $model = $this->findModel($id);
        $modelsContent = $model->headerContent;
        $old_image = $model->logo;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsContent, 'id', 'id');
            $modelsContent = Model::createMultiple(HeaderContent::classname());//, $modelsContent);
            Model::loadMultiple($modelsContent, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsContent, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsContent) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $this->uploadImage($model, $old_image);
                    if ($flag = $model->save()) {
                        if (!empty($deletedIDs)) {
                            HeaderContent::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsContent as $modelContent) {
                            $modelContent->id = $this->keyValue(HeaderContent::className(), $model->id);
                            $modelContent->nav_id = $model->id;
                            if (! ($flag = $modelContent->save())) {
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
            'modelsContent' => (empty($modelsContent)) ? [new HeaderContent] : $modelsContent
        ]);
    }






    /**
     * Deletes an existing Header model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        HeaderContent::deleteAll(['nav_id' => $model->id]);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Header model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Header the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Header::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }   
    protected function uploadImage($model, $old_image = Null)
    {   
        $uploaded_image = UploadedFile::getInstance($model, 'logo');
        if(isset($uploaded_image)){
            $image_name = $model->id.'.png';
            $image_path = 'uploads/header/'.$image_name;
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

    // protected function keyValue($class, $header_id=null)
    // {   $last = $class::find()->where(['content_id' => $header_id])->orderBy(['id' => SORT_DESC])->one();
    //      if(is_null($last) || $last->id == 'header0000')
    //         { return 'header0001';
    //         } 
    //     $id = $last->id;
    //     return ++$id;
    // }

    protected function keyValue($class, $id = Null)
    {   //$last = $model::find()->orderBy(['id' => SORT_DESC])->one();
        if ($class::classname()=='backend\models\Header') {
            $last = $class::find()->orderBy(['id' => SORT_DESC])->one();
            if(is_null($last) || $last->id == 'header0000')
            { return 'header0001';
            } 
            $id = $last->id;
            return ++$id;
        }
        else if ($class::classname()=='backend\models\HeaderContent') {
             $last = $class::find()->where(['nav_id' => $id])->orderBy(['id' => SORT_DESC])->one();
             if(is_null($last) || $last->id == $id.'0000')
            { return $id.'0001';
            } 
            $id = $last->id;
            return ++$id;
        }
    }


}
