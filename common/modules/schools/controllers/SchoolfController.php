<?php

namespace common\modules\schools\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use common\modules\schools\models\Schools;
use common\modules\schools\models\SchoolGovCouncil;
use common\modules\schools\models\SchoolCommittee;



class SchoolfController extends \yii\web\Controller
{
    public function actionIndex($id)
    {   
        $school = $this->findSchoolModel($id);
        $this->actionContainerHome($id);
        return $this->render('index', ['school' => $school]);
    }

    public function actionContainerHome($id)
    {
        $school = $this->findSchoolModel($id);
        $abc = 'hello';
        return $this->renderAjax('home', ['school' => $school]);
    }

    public function actionContainerVision($id)
    {
        $school = $this->findSchoolModel($id);
        return $this->renderAjax('vision', ['school' => $school]);
    }

    public function actionContainerGovernance($id)
    {
        $governs = $this->findSchoolGovModel($id);
        return $this->renderAjax('governance', ['governs' => $governs]);
    }

    public function actionContainerCommittee($id)
    {
        $members = $this->findSchoolComModel($id);
        return $this->renderAjax('committee', ['members' => $members]);
    }

    public function actionContainerContact()
    {
        return $this->renderAjax('contact');
    }

    public function actionContainerComsoon()
    {
        return $this->renderAjax('comsoon');
    }




    protected function findSchoolModel($id)
    {
        if (($model = Schools::findOne(['school_id' => $id])) !== null) {
            return $model;
        }
        else
            //return new Schools();  //return warning
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findSchoolGovModel($id)
    {
        if (($models = SchoolGovCouncil::find()->where(['school_id' => $id])->orderBy('sort_order')->all()) !== null) {
            return $models;
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findSchoolComModel($id)
    {
        if (($models = SchoolCommittee::find()->where(['school_id' => $id])->orderBy('sort_order')->all()) !== null) {
            return $models;
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
