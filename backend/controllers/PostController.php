<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        return $this->render('postAcceptor');
    }

  
}
