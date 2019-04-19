<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use common\models\Produk;
use common\models\Pesanan;
use common\models\Detailpesanan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\OrderForm;
use backend\models\BayarForm;

/**
 * TransaksiController implements the CRUD actions for pesanan model.
 */
class TransaksiController extends Controller
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
     * Lists all pesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'possimpel';

        $query = Detailpesanan::find();
        $query->joinWith(['pesananIdPesanan']);
        $query->joinWith(['produkIdProduk']);
        $query->where(['=', 'pesanan.is_pesanansukses', '0']);
        // $query->where(['<', 'id_pesanan', 5]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $model = new OrderForm();
        $bayar = new BayarForm();
        $totalBayar = 0;

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->post('submitTambah')) {
                $idpesanan = $model->order();
                if ($idpesanan != 0) {
                    $biaya = Detailpesanan::find()
                                ->where(['=', 'pesanan_id_pesanan', $idpesanan]);
                    
                    $totalBayar = $biaya->sum('total_harga');
                }
            }
        }

        elseif ($bayar->load(Yii::$app->request->post())) {
            if (Yii::$app->request->post('submitBayar')) {

                if ($bayar->bayar()) {
                    return $this->redirect(Url::base().'/transaksi/index');
                }
            }
            elseif (Yii::$app->request->post('submitCancel')) {

                if ($bayar->cancel()) {
                    return $this->redirect(Url::base().'/transaksi/index');
                }
            }
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'bayar' => $bayar,
            'totalBayar' => $totalBayar,
        ]);
    }


    /**
     * Updates an existing pesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_pesanan
     * @param integer $akun_id_akun
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pesanan, $akun_id_akun)
    {
        $model = $this->findModel($id_pesanan, $akun_id_akun);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pesanan' => $model->id_pesanan, 'akun_id_akun' => $model->akun_id_akun]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing pesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pesanan
     * @param integer $akun_id_akun
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pesanan, $akun_id_akun)
    {
        $this->findModel($id_pesanan, $akun_id_akun)->delete();

        return $this->redirect(['index']);
    }

    // /**
    //  * Finds the pesanan model based on its primary key value.
    //  * If the model is not found, a 404 HTTP exception will be thrown.
    //  * @param integer $id_pesanan
    //  * @param integer $akun_id_akun
    //  * @return pesanan the loaded model
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // protected function findModel($id_pesanan, $akun_id_akun)
    // {
    //     if (($model = pesanan::findOne(['id_pesanan' => $id_pesanan, 'akun_id_akun' => $akun_id_akun])) !== null) {
    //         return $model;
    //     }

    //     throw new NotFoundHttpException('The requested page does not exist.');
    // }
}
