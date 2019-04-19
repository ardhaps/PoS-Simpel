<?php

namespace backend\controllers;

use Yii;
use common\models\akun;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * AkunController implements the CRUD actions for akun model.
 */
class AkunController extends Controller
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
     * Lists all akun models.
     * @return mixed
     */
    public function actionIndex()
    {

        $this->layout = 'possimpel';
        $dataProvider = new ActiveDataProvider([
            'query' => akun::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single akun model.
     * @param integer $id_akun
     * @param integer $hakakses_id_hakakses
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_akun, $hakakses_id_hakakses)
    {
        $this->layout = 'possimpel';
        return $this->render('view', [
            'model' => $this->findModel($id_akun, $hakakses_id_hakakses),
        ]);
    }

    /**
     * Creates a new akun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'possimpel';
        $model = new akun();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_akun' => $model->id_akun, 'hakakses_id_hakakses' => $model->hakakses_id_hakakses]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing akun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_akun
     * @param integer $hakakses_id_hakakses
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_akun, $hakakses_id_hakakses)
    {
        $this->layout = 'possimpel';
        $model = $this->findModel($id_akun, $hakakses_id_hakakses);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_akun' => $model->id_akun, 'hakakses_id_hakakses' => $model->hakakses_id_hakakses]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing akun model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_akun
     * @param integer $hakakses_id_hakakses
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_akun, $hakakses_id_hakakses)
    {
        $this->findModel($id_akun, $hakakses_id_hakakses)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the akun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_akun
     * @param integer $hakakses_id_hakakses
     * @return akun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_akun, $hakakses_id_hakakses)
    {
        if (($model = akun::findOne(['id_akun' => $id_akun, 'hakakses_id_hakakses' => $hakakses_id_hakakses])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
