<?php

namespace common\modules\schools\controllers;

use Yii;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
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
            $modelSchool->id = $this->keyValue(Schools::classname()); //comment this for int id

            $modelsSlider = Model::createMultiple(SchoolSlider::classname());
            Model::loadMultiple($modelsSlider, Yii::$app->request->post());

            foreach($modelsSlider as $index => $modelSlider){

                $modelSlider->id = $this->keyValue(SchoolSlider::className());
                $modelSlider->image = $this->uploadImage($modelSlider, "[{$index}]image");
            }

            // validate all models
            $valid = $modelSchool->validate();
            $valid = Model::validateMultiple($modelsSlider) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $modelSchool->save(false)) {
                        foreach ($modelsSlider as $modelSlider) {
                            // $modelSlider->id = $this->keyValue(SchoolSlider::classname());
                            $modelSlider->school_id = $modelSchool->school_id;
                            if (! ($flag = $modelSlider->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelSchool->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        $this->layout = 'modal';
        return $this->render('create', [
            'modelSchool' => $modelSchool,
            'modelsSlider' => (empty($modelsSlider)) ? [new SchoolSlider] : $modelsSlider
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

    protected function keyValue($class)
    {   //$last = $model::find()->orderBy(['id' => SORT_DESC])->one();
        $id = $class::find()->select(['id'=>'MAX(`id`)'])->one()->id;

        if(empty($id))
        { return $class::ID_PREFIX.'0001';
        } 
        return ++$id;
    }

    protected function uploadImage($model, $attribute)
    {   
        $uploaded_image = UploadedFile::getInstance($model, $attribute);
        $image_name = $uploaded_image;#$model->id.'.png';#.$model->slider_image->getExtension(); 
        $image_path = "uploads/".$image_name;


        $cond =  $model->save() && !is_null($uploaded_image);

        if($cond){
            // $uploaded_image->saveAs($image_path);
            return $image_path;
        }
        
    }


}
