<?php

namespace common\modules\schools\controllers;

use yii\web\Controller;

use common\modules\schools\models\Schools;

/**
 * Default controller for the `schools` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {   
        $schools = Schools::find()->all();
        echo '<br>';
        return $this->render('index', ['schools'=> $schools]);
    }

    // public function actionSchool($id)
    // {
    //     Yii::$app->runAction('schoolf/index',[$id]);
    // }
}
