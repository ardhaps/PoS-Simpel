<?php

namespace backend\controllers;

use Yii;
use common\models\Detailpesanan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailpesananController implements the CRUD actions for Detailpesanan model.
 */
class DetailpesananController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Detailpesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Detailpesanan::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detailpesanan model.
     * @param integer $id_detailpesanan
     * @param integer $pesanan_id_pesanan
     * @param integer $produk_id_produk
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk),
        ]);
    }

    /**
     * Creates a new Detailpesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detailpesanan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_detailpesanan' => $model->id_detailpesanan, 'pesanan_id_pesanan' => $model->pesanan_id_pesanan, 'produk_id_produk' => $model->produk_id_produk]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detailpesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_detailpesanan
     * @param integer $pesanan_id_pesanan
     * @param integer $produk_id_produk
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk)
    {
        $model = $this->findModel($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_detailpesanan' => $model->id_detailpesanan, 'pesanan_id_pesanan' => $model->pesanan_id_pesanan, 'produk_id_produk' => $model->produk_id_produk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detailpesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_detailpesanan
     * @param integer $pesanan_id_pesanan
     * @param integer $produk_id_produk
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk)
    {
        $this->findModel($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detailpesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_detailpesanan
     * @param integer $pesanan_id_pesanan
     * @param integer $produk_id_produk
     * @return Detailpesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_detailpesanan, $pesanan_id_pesanan, $produk_id_produk)
    {
        if (($model = Detailpesanan::findOne(['id_detailpesanan' => $id_detailpesanan, 'pesanan_id_pesanan' => $pesanan_id_pesanan, 'produk_id_produk' => $produk_id_produk])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
