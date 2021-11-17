<?php

namespace frontend\controllers;

use app\models\User;
use frontend\models\Posts;
use frontend\models\Posts2;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class PostArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;
        $model = Posts::find()->where(['posted_by' => $user_id])->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new Posts();
        if ($model->load(Yii::$app->request->post())) {
            $model->posted_by = Yii::$app->user->identity->getId();
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $user_id = Yii::$app->user->identity->id;
        $model = Posts::findOne(['id' => $id, 'posted_by' => $user_id]);
        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $user_id = Yii::$app->user->identity->id;
        $model = Posts::findOne(['id' => $id, 'posted_by' => $user_id]);
        if ($model->load(Yii::$app->request->post())) {
            $model->posted_by = Yii::$app->user->identity->getId();
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $user_id = Yii::$app->user->identity->id;
        if (Posts::find()->where(['id' => $id, 'posted_by' => $user_id])->exists()) {
            $model = Posts::find()->where(['id' => $id])->one();
            if ($model->delete()) {
                return $this->redirect(['index']);
            }
        }
    }

    public function actionFake()
    {
        $faker = \Faker\Factory::create();

        $posts = new Posts();
        for ($i = 1; $i <= 100; $i++) {
            $posts->setIsNewRecord(true);
            $posts->id = null;
            $posts->posted_by = rand(1, 2);
            $posts->title = $faker->words(random_int(5, 10), true);
            $posts->body = $faker->paragraph(random_int(10, 20));
            $posts->save();
        }
    }

    public function actionFake2()
    {
        $faker = \Faker\Factory::create();

        $posts = new Posts2();
        for ($i = 1; $i <= 100; $i++) {
            $posts->setIsNewRecord(true);
            $posts->id = null;
            $posts->posted_by = rand(1, 2);
            $posts->title = $faker->words(random_int(5, 10), true);
            $posts->body = $faker->paragraph(random_int(10, 20));
            $posts->save();
        }
    }

}