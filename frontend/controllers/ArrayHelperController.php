<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;


/**
 * UrlHelpers controller
 */
class ArrayHelperController extends Controller
{
    public function actionIndex()
    {
        /*$array = //['one','two','three'];
            [
                'one' => ['one1', 'one2', 'one3' => ['one-3-one', 'one-3-two']],
                'two' => ['two1', 'two2', 'two3'],
                'three',
                'four',
                'five' => ['five1', 'five2', 'five3']
            ];


        //$data = ArrayHelper::getValue($array, 'one');
        if(ArrayHelper::keyExists('six',$array)){
            echo 'Key exist';
        }else{
            echo 'key does not exist';
        }*/
       // echo json_encode($data);




        $array1 = ['id'=>1,'name'=>'john','phone'=>12363];
        $array2 = ['id1'=>2,'name1'=>'daniel','phone1'=>834835];


        //$data = ArrayHelper::index($array,'name');
        //$data = ArrayHelper::getColumn($array,'phone');
        //$data = ArrayHelper::map($array,'name','name');

        //$data = ArrayHelper::multisort($array, ['id','name'],SORT_DESC);

        $merge = ArrayHelper::merge($array1,$array2);

        if(ArrayHelper::isIn('3',$merge)){
            echo 'Value exist';
        }else{
            echo 'Value does not exist';
        }

//        echo json_encode($merge);


    }


}
