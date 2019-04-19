<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use common\models\Produk;
use common\models\Pesanan;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Penjualan';
?>

<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title"><?= Html::encode($this->title) ?> </h2>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">

        <!-- ============================================================== -->
        <!-- cek produk -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Cek Pesanan</h5>
                <div class="card-body">
                    <form id="form" data-parsley-validate="" novalidate="">
                        <div class="form-group row">
                            <label class="col-3 col-lg-2 col-form-label text-right">Tanggal</label>
                            <div class="col-9 col-lg-10">
                                <h3 class="text-center"> <?php echo date('Y-m-d'); ?> </h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-lg-2 col-form-label text-right">No. Order</label>
                            <div class="col-9 col-lg-10">
                                <h3 class="text-center">
                                <?php 
                                    $idLastPesanan = Pesanan::find()
                                                    ->orderBy(['id_pesanan'=> SORT_DESC])
                                                    ->one();
                                    if($idLastPesanan != null) {;
                                        echo '00000000'.$idLastPesanan->id_pesanan;
                                    } else {
                                        echo 1;
                                    }
                                ?>  
                                </h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-lg-2 col-form-label text-right"></label>
                            <div class="col-9 col-lg-10">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end cek produk -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- produk dibeli -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Produk Dibeli</h5>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                        <form id="form" data-parsley-validate="" novalidate="">

                            <?= $form->field($model, 'produk_id_produk',[
                                'template' => '<div class="form-group row">
                                                    <label for="detailpesanan-produk_id_produk" class="col-4 col-lg-4 col-form-label text-left">
                                                        Produk
                                                    </label>
                                                    <div class="col-8 col-lg-8">
                                                        {input}
                                                    </div>
                                                </div>'
                                                ])->dropDownList(
                                                    ArrayHelper::map(Produk::find()->all(), 'id_produk', 'nama_produk'),
                                                    ['prompt'=>'Pilih Produk']
                                                ); ?>

                            <?= $form->field($model, 'jumlah_barang',[
                                'template' => '<div class="form-group row">
                                                    <label for="detailpesanan-jumlah_barang" class="col-4 col-lg-4 col-form-label text-left">
                                                        {label}
                                                    </label>
                                                    <div class="col-4 col-lg-4">
                                                        {input}
                                                    </div>
                                                </div>'
                                                ])->textInput(['type'=>'number']); ?>

                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <?= Html::submitButton('Tambah', ['name' => 'submitTambah', 'value' => 'submitTambah', 'class' => 'btn btn-space btn-primary']) ?>
                                </p>
                            </div>
                        </form>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end produk dibeli -->
        <!-- ============================================================== -->
        
    </div>

    <div class="detailpesanan-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'pesananIdPesanan.id_pesanan',
                'produkIdProduk.nama_produk',
                'jumlah_barang',
                'total_harga',
            ],
        ]); ?>
    </div>
    <br />


    <div class="row">

    

        <!-- ============================================================== -->
        <!-- bayar -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="width: 50%;margin: 0 auto;">
            <div class="card">
                <h5 class="card-header">Bayar</h5>
                <div class="card-body">
                     <?php $form = ActiveForm::begin(); ?>

                        <form id="form" data-parsley-validate="" novalidate="">

                            <div class="form-group row">
                                <label class="col-3 col-lg-2 col-form-label text-right">Total Harga</label>
                                <div class="col-9 col-lg-10">
                                    <h3 class="text-center">  
                                        <?php 
                                            echo $totalBayar;
                                        ?>  
                                    </h3>
                                </div>
                            </div>

                            <?= $form->field($bayar, 'uang_pembayaran',[
                                'template' => '<div class="form-group row">
                                                    <label for="pesanan-uang_pembayaran" class="col-4 col-lg-4 col-form-label text-left">
                                                        {label}
                                                    </label>
                                                    <div class="col-8 col-lg-8">
                                                        {input}
                                                    </div>
                                                </div>'
                                                ])?>

                            <!-- <div class="form-group row">
                                <label class="col-3 col-lg-2 col-form-label text-right">Kembalian</label>
                                <div class="col-9 col-lg-10">
                                    <h3 class="text-center"> 
                                        <?php  
                                       
                                        ?> 
                                    </h3>
                                </div>
                            </div> -->

                            <div class="col-sm-12 pl-0">
                                <p class="text-right">
                                    <?= Html::submitButton('Bayar', ['name' => 'submitBayar', 'value' => 'submitBayar', 'class' => 'btn btn-space btn-success']) ?>
                                    <?= Html::submitButton('Cancel', ['name' => 'submitCancel', 'value' => 'submitCancel', 'class' => 'btn btn-space btn-danger']) ?>
                                </p>
                            </div>
                        </form>
                     <?php ActiveForm::end(); ?> 

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end bayar -->
        <!-- ============================================================== -->
        
    </div>

    


    <!-- <div class="row"> -->
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Validation Types</h5>
                <div class="card-body">
                    <form id="validationform" data-parsley-validate="" novalidate="">
                        
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Range Value</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input required="" type="number" min="6" max="100" placeholder="Number between 6 - 100" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- end valifation types -->
        <!-- ============================================================== -->
    <!-- </div> -->
</div>

