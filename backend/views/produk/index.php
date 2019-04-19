<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'Master Produk';
?>
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">            
            <div class="card">
                <h5 class="card-header">Data Produk</h5>
                <div class="card-body">                    
            
                <div class="produk-index">                            
                    <p>
                        <?= Html::a('Buat Baru Produk', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'akunIdAkun.nama',
                            'nama_produk',
                            'deskripsi_produk',
                            'stok_produk',
                            'harga_produk',
                            // 'update_produk',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>