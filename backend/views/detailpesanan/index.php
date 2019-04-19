<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detailpesanans';
?>
<div class="detailpesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detailpesanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detailpesanan',
            'pesanan_id_pesanan',
            'produk_id_produk',
            'jumlah_barang',
            'total_harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
