<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\produk */

$this->title = 'Update Produk: '.'#'.$model->id_produk.' '.$model->nama_produk;

?>
    <div class="ecommerce-widget">

        <div class="produk-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            </div>
        </div>
    </div>
</div>
