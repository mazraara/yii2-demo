<?php

namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;

class ChangePasswordController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
        $model = User::find()->where(['id' => \Yii::$app->user->getId()])->one();

        if ($model->load(\Yii::$app->request->post())) {
            if (\Yii::$app->security->validatePassword($model->old_password, $model->password_hash)) {
                $password = \Yii::$app->security->generatePasswordHash($model->new_password);
                $model->password_hash = $password;
                if ($model->save()) {
                    echo 'Password is updated';
                }
                echo 'Password is correct';
            } else {
                echo 'Password is not correct';
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionCrypt()
    {
        $encrypt = \Yii::$app->security->encryptByPassword('This is testing of encryption', 12345);
        return $this->render('crypt', ['encrypt' => $encrypt]);
    }


}