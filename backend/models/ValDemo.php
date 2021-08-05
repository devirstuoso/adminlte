<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "val_demo".
 *
 * @property int $id
 */
class ValDemo extends \yii2tech\filedb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function fileName()
    {
        return 'val_demo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            // [['id'], 'valId']
        ];
    }

    public function valId($attribute, $params, $validator){
    if($this->$attribute != '10'){
        $validator->addError($this, $attribute, 'Inserted id "{value}" is not 10.');
      }
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }
}
