<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Detailpesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailpesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pesanan_id_pesanan')->textInput() ?>

    <?= $form->field($model, 'produk_id_produk')->textInput() ?>

    <?= $form->field($model, 'jumlah_barang')->textInput() ?>

    <?= $form->field($model, 'total_harga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
