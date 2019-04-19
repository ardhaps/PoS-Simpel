<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\pesanan */

$this->title = 'Update Pesanan: ' . $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Pesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesanan, 'url' => ['view', 'id_pesanan' => $model->id_pesanan, 'akun_id_akun' => $model->akun_id_akun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
