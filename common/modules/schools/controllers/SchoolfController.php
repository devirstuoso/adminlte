<?php

namespace common\modules\schools\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use common\modules\schools\models\Schools;
use common\modules\schools\models\SchoolHome;
use common\modules\schools\models\SchoolObj;
use common\modules\schools\models\SchoolGovCouncil;
use common\modules\schools\models\SchoolCommittee;
use common\modules\schools\models\SchoolOffice;

use backend\models\ContactForm;



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
        $contents = $this->findSchoolHomModel($id);
        if(sizeof($contents)>0){
            return $this->renderAjax('home', ['contents' => $contents]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerVision($id)
    {   
        $contents = $this->findSchoolObjModel($id);
        if(sizeof($contents)>0){
            return $this->renderAjax('vision', ['contents' => $contents]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerGovernance($id)
    {
        $governs = $this->findSchoolGovModel($id);
        if(sizeof($governs)>0) {
            return $this->renderAjax('governance', ['governs' => $governs]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerCommittee($id)
    {
        $members = $this->findSchoolComModel($id);
        if(sizeof($members)>0) {
            return $this->renderAjax('committee', ['members' => $members]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerOffice($id, $school)
    {
        $members = $this->findSchoolOffModel($id);
        if(sizeof($members)>0) {
            return $this->renderAjax('office', ['members' => $members, 'school_name' => $school]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerOffice2($id, $school_name)
    {
        $member = $this->findOffMemberModel($id);
        if(!is_null($member)) {
           return $this->renderAjax('office-2', ['member' => $member, 'school_name' => $school_name]);
        }
        else{
            return $this->renderAjax('comsoon');
        }
    }

    public function actionContainerContact($id)
    {
        $contactform = new ContactForm();
        if ($contactform->load(Yii::$app->request->post())) {
            $contactform->id = $this::cf_keyValue();
            if ($contactform->save ()) {
                // $contactform->sendEmail();
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->actionIndex($id);
        }
            return $this->renderAjax('contact', [ 'contactform' => $contactform ]);
   
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

    protected function findSchoolHomModel($id)
    {
        if (($models = SchoolHome::find()->where(['school_id' => $id])->orderBy('sort_order')->all()) !== null) {
            return $models;
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }   

    protected function findSchoolObjModel($id)
    {
        if (($models = SchoolObj::find()->where(['school_id' => $id])->orderBy('sort_order')->all()) !== null) {
            return $models;
        }
        else
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

    protected function findSchoolOffModel($id)
    {
        if (($models = SchoolOffice::find()->where(['school_id' => $id])->all()) !== null) {
            return $models;
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findOffMemberModel($id)
    {
        if (($models = SchoolOffice::find()->where(['id' => $id])->one()) !== null) {
            return $models;
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function cf_keyValue()
    {   $last = ContactForm::find()->orderBy(['id' => SORT_DESC])->one();

        if ($last->id == 'enquiry') {
        return 'enquiry000001';   
        }
        $id = $last->id;
        return ++$id;
    }

}
