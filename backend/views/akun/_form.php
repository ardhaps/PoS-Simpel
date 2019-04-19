<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Hakakses;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\akun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="akun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
                                                    ArrayHelper::map(User::find()->all(), 'id', 'username'),
                                                    ['prompt'=>'Pilih User']
                                                );  ?>

    <?= $form->field($model, 'hakakses_id_hakakses')->dropDownList(
                                                    ArrayHelper::map(Hakakses::find()->all(), 'id_hakakses', 'hakakses'),
                                                    ['prompt'=>'Pilih Akses']
                                                ); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_toko')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
