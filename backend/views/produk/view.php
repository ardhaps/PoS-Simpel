<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\produk */

$this->title = 'Detail Produk: '.'#'.$model->id_produk.' '.$model->nama_produk;
\yii\web\YiiAsset::register($this);
?>
    <div class="ecommerce-widget">
        <div class="produk-view">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id_produk' => $model->id_produk, 'akun_id_akun' => $model->akun_id_akun], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id_produk' => $model->id_produk, 'akun_id_akun' => $model->akun_id_akun], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Anda yakin akan menghapus data ini?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'akunIdAkun.nama',
                    'nama_produk',
                    'deskripsi_produk',
                    'stok_produk',
                    'harga_produk',
                    'update_produk',
                ],
            ]) ?>
            </div>
        </div>
    </div>
</div>
        