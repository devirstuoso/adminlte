<?php

namespace common\modules\schools\controllers;

use Yii;
use common\modules\schools\models\SchoolGovCouncil;
use common\modules\schools\models\SchoolGovCouncilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/**
 * SchoolGovCouncilController implements the CRUD actions for SchoolGovCouncil model.
 */
class SchoolGovCouncilController extends Controller
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
     * Lists all SchoolGovCouncil models.
     * @return mixed
     */
    public function actionIndex($school_id= null)
    {
        $searchModel = new SchoolGovCouncilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $school_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolGovCouncil model.
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
     * Creates a new SchoolGovCouncil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolGovCouncil();

        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue(SchoolGovCouncil::classname());
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->renderPartial('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SchoolGovCouncil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderPartial('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SchoolGovCouncil model.
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
     * Finds the SchoolGovCouncil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SchoolGovCouncil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolGovCouncil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function keyValue($class, $school_id = Null)
    {   
        $id = $class::find()->select(['id'=>'MAX(`id`)'])->one()->id;
            if(empty($id))
            { return $class::ID_PREFIX.'0001';
            } 
            return ++$id;
        }
}
