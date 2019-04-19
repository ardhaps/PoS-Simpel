<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Dashboard';
?>
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"><?= Html::encode($this->title) ?> </h2>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">                        
            
            <div class="row">                            
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- category revenue  -->
                <!-- ============================================================== -->
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Revenue by Category</h5>
                        <div class="card-body">
                            <div id="c3chart_category" style="height: 420px;"></div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end category revenue  -->
                <!-- ============================================================== -->

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"> Total Revenue</h5>
                        <div class="card-body">
                            <div id="morris_totalrevenue"></div>
                        </div>
                        <div class="card-footer">
                            <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
            