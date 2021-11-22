<?php

namespace frontend\controllers;

use app\models\User;
use frontend\models\Posts;
use frontend\models\Posts2;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use yii\web\UploadedFile;

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
        //$model = Posts::find()->where(['posted_by'=>$user_id])->all();

        $model = new ActiveDataProvider(
            [
                'query' => Posts::find()->where(['posted_by' => $user_id]),
                'pagination' => [
                    'pageSize' => 20
                ]
            ]
        );

        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new Posts();
        if ($model->load(Yii::$app->request->post())) {
            $model->posted_by = Yii::$app->user->identity->getId();
            $image = UploadedFile::getInstance($model, 'image');
            $image->saveAs('img/upload/' . $image->baseName . '.' . $image->extension);
            $model->image = $image->baseName . '.' . $image->extension;
            if ($model->save()) {
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

    public function actionPjax()
    {
        $message = Yii::$app->request->post('message');
        $response = null;
        if (!is_null($message)) {
            $response = 'Your message is: ' . $message;
        }
        return $this->render('pjax', ['response' => $response]);
    }

}