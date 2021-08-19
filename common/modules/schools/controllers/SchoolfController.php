<?php

namespace common\modules\schools\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use common\modules\schools\models\Schools;


class SchoolfController extends \yii\web\Controller
{
    public function actionIndex($id)
    {   
        $school = $this->findModel($id);
        $this->actionContainerHome($id);
        return $this->render('index', ['school' => $school]);
    }

    public function actionContainerHome($id)
    {
        $school = $this->findModel($id);
        $abc = 'hello';
        return $this->renderAjax('home', ['school' => $school]);
    }

    public function actionContainerVision($id)
    {
        $school = $this->findModel($id);
        return $this->renderAjax('vision', ['school' => $school]);
    }

    public function actionContainerGovernance($id)
    {
        $school = $this->findModel($id);
        return $this->renderAjax('governance', ['school' => $school]);
    }





    protected function findModel($id)
    {
        if (($model = Schools::findOne(['school_id' => $id])) !== null) {
            return $model;
        }
        else
            //return new Schools();  //return warning
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
