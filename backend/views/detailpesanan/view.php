<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Detailpesanan */

$this->title = $model->id_detailpesanan;
$this->params['breadcrumbs'][] = ['label' => 'Detailpesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detailpesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_detailpesanan' => $model->id_detailpesanan, 'pesanan_id_pesanan' => $model->pesanan_id_pesanan, 'produk_id_produk' => $model->produk_id_produk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_detailpesanan' => $model->id_detailpesanan, 'pesanan_id_pesanan' => $model->pesanan_id_pesanan, 'produk_id_produk' => $model->produk_id_produk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_detailpesanan',
            'pesanan_id_pesanan',
            'produk_id_produk',
            'jumlah_barang',
            'total_harga',
        ],
    ]) ?>

</div>
