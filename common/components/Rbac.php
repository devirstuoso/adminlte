<?php 
namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\ForbiddenHttpException;


class Rbac extends Component {
    public function role($access) {
        if(is_array($access)) {
            $grant = false;
            foreach ($access as $key => $acc) {
                if(Yii::$app->user->can($acc)) {
                    $grant = true;
                    }
            }
            if ($grant==false) {
               throw new ForbiddenHttpException;
            }
        }
        else{
            if(!Yii::$app->user->can($access)) {
                throw new ForbiddenHttpException;
                }
        }
    }
    public function role_chk($access) {
        if(is_array($access)) {
            foreach ($access as $key => $acc) {
                if(Yii::$app->user->can($acc)) {
                    return true;
                    }
            }
            return false;
        }
        else{
            if(!Yii::$app->user->can($access)) {
                return false;
                }
            else return true;
        }
    }
}

?>