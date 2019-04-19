<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\pesanan */

$this->title = $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Pesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pesanan' => $model->id_pesanan, 'akun_id_akun' => $model->akun_id_akun], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pesanan' => $model->id_pesanan, 'akun_id_akun' => $model->akun_id_akun], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pesanan',
            'akun_id_akun',
            'is_pesanansukses',
            'tanggal_pesanan',
            'uang_pembayaran',
            'uang_kembalian',
        ],
    ]) ?>

</div>
