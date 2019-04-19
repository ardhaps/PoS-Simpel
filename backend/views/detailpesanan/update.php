<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Detailpesanan */

$this->title = 'Update Detailpesanan: ' . $model->id_detailpesanan;
$this->params['breadcrumbs'][] = ['label' => 'Detailpesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detailpesanan, 'url' => ['view', 'id_detailpesanan' => $model->id_detailpesanan, 'pesanan_id_pesanan' => $model->pesanan_id_pesanan, 'produk_id_produk' => $model->produk_id_produk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detailpesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
