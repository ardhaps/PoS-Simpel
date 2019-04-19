<?php

namespace backend\controllers;

use Yii;
use common\models\produk;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * ProdukController implements the CRUD actions for produk model.
 */
class ProdukController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'ruleConfig' => [
    //                 'class' => AccessRule::className(),
    //             ],
    //             'only' => ['index', 'view', 'create', 'update', 'delete'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['index', 'view', 'create', 'update', 'delete'],
    //                     'allow' => true,
    //                     'roles' => [
    //                         1
    //                     ],
    //                     'denyCallback' => function ($rule, $action) {
    //                         $this->actionLogout();
    //                     }
    //                 ],
    //             ],
    //         ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'possimpel';
        
        $dataProvider = new ActiveDataProvider([
            'query' => produk::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single produk model.
     * @param integer $id_produk
     * @param integer $akun_id_akun
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_produk, $akun_id_akun)
    {
        $this->layout = 'possimpel';
        return $this->render('view', [
            'model' => $this->findModel($id_produk, $akun_id_akun),
        ]);
    }

    /**
     * Creates a new produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'possimpel';
        $model = new produk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_produk' => $model->id_produk, 'akun_id_akun' => $model->akun_id_akun]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_produk
     * @param integer $akun_id_akun
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_produk, $akun_id_akun)
    {
        $this->layout = 'possimpel';
        $model = $this->findModel($id_produk, $akun_id_akun);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_produk' => $model->id_produk, 'akun_id_akun' => $model->akun_id_akun]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing produk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_produk
     * @param integer $akun_id_akun
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_produk, $akun_id_akun)
    {
        $this->findModel($id_produk, $akun_id_akun)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_produk
     * @param integer $akun_id_akun
     * @return produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_produk, $akun_id_akun)
    {
        if (($model = produk::findOne(['id_produk' => $id_produk, 'akun_id_akun' => $akun_id_akun])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
