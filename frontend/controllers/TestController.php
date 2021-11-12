<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionServer()
    {
        echo 'Yii is working';
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionRender()
    {
        $var = 'hello';
        $data = ['test'=> 100, 'test2'=> 200];
        return $this->render('render', ['var'=>$var, 'data'=>$data]);
    }
}
