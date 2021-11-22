<?php

namespace frontend\controllers;

use frontend\models\User;
use yii\data\Pagination;
use yii\web\Controller;
use frontend\models\Posts;

class PostsController extends Controller
{

    public function actionIndex()
    {
        $posts = Posts::find()->where(['status'=>1])->andWhere('posted_by != 0 and posted_by != ""');
        $countQuery = clone $posts;
        $pages = new Pagination(['totalCount'=>$countQuery->count()]);
        $models = $posts->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index',['models'=>$models,'pages'=>$pages]);
    }

    public function actionPost($id)
    {
        $post = Posts::findOne(['slug' => $id]);
        return $this->render('post',['post'=>$post]);
    }

    public function actionUser($id)
    {
        $user = User::findOne(['id'=>$id]);
        return $this->render('user',['user'=>$user]);
    }

}