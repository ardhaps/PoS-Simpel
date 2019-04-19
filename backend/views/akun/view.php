<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\akun */
$this->title = 'Detail Akun: '.'#'.$model->id_akun.' '.$model->nama;
\yii\web\YiiAsset::register($this);
?>
        <div class="ecommerce-widget">
            <div class="akun-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Update', ['update', 'id_akun' => $model->id_akun, 'hakakses_id_hakakses' => $model->hakakses_id_hakakses], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id_akun' => $model->id_akun, 'hakakses_id_hakakses' => $model->hakakses_id_hakakses], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Anda yakin akan menghapus data ini?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'user.username',
                        'hakaksesIdHakakses.hakakses',
                        'nama',
                        'no_telepon',
                        'alamat',
                        'alamat_toko',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
