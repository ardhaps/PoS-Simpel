<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Akun';
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
        <h5 class="card-header">Data Akun</h5>
        <div class="card-body">        
    
            <div class="produk-index">                            

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'user.username',
                            'hakaksesIdHakakses.hakakses',
                            'nama',
                            'no_telepon',
                            'alamat',
                            //'alamat_toko',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        