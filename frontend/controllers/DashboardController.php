<?php

namespace frontend\controllers;


use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\components\AccessRule;

class DashboardController extends \yii\web\Controller
{
    // public function behaviors()
    // {
        // return [
        //     'access' => [
        //         'class' => AccessControl::className(),
        //         'ruleConfig' => [
        //             'class' => AccessRule::className(),
        //         ],
        //         'only' => ['index'],
        //         'rules' => [
        //             [
        //                 'actions' => ['index'],
        //                 'allow' => true,
        //                 'roles' => [
        //                     1
        //                 ],
        //                 // 'denyCallback' => function ($rule, $action) {
        //                 //     $this->actionLogout();
        //                 // }
        //             ],
        //         ],
        //     ],
        // ];
    // }

    public function actionIndex()
    {
        $this->layout = 'possimpel2';
        return $this->render('index');
    }

}
