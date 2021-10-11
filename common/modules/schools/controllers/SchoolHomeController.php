<?php

namespace common\modules\schools\controllers;

use Yii;
use common\modules\schools\models\SchoolHome;
use common\modules\schools\models\SchoolHomeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolHomeController implements the CRUD actions for SchoolHome model.
 */
class SchoolHomeController extends Controller
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
     * Lists all SchoolHome models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolHomeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolHome model.
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
     * Creates a new SchoolHome model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->rbac->role('school-create');

        $model = new SchoolHome();
        if ($model->load(Yii::$app->request->post())) {
            $model->id = $this->keyValue(SchoolHome::classname());
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
     * Updates an existing SchoolHome model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Yii::$app->rbac->role('school-update');

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->layout = 'modal';
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SchoolHome model.
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
     * Finds the SchoolHome model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SchoolHome the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolHome::findOne($id)) !== null) {
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
