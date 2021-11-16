<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class ProductController extends Controller
{
    /*public function behaviors()
    {
        return[
          'access'=>[
              'class'=>AccessControl::className(),
              'except'=>['index'],
              'rules'=>[
                  [
                  'allow'=>true,
                  'roles'=>['@']
                  ]
              ]
          ]
        ];
    }*/

    public function actionIndex()
    {
        $menu = 'category';
        return $this->render('index', ['menu' => $menu]);
    }

    public function actionDetail($id, $name)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }

        return $this->render('detail', ['id' => $id, 'name' => $name]);
    }

    public function actionDetail2()
    {
        echo 'detail 2';
    }
}