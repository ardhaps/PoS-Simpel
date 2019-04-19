<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\pesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'akun_id_akun')->textInput() ?>

    <?= $form->field($model, 'is_pesanansukses')->textInput() ?>

    <?= $form->field($model, 'tanggal_pesanan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
