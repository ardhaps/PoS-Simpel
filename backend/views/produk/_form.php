<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Akun;

/* @var $this yii\web\View */
/* @var $model common\models\produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'akun_id_akun')->dropDownList(
                                                    ArrayHelper::map(Akun::find()->all(), 'id_akun', 'nama'),
                                                    ['prompt'=>'Pilih Akun']
                                                ); ?>

    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stok_produk')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'harga_produk')->textInput(['type' => 'number']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
