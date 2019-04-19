<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\akun */

$this->title = 'Update Akun: '.'#'.$model->id_akun.' '.$model->nama;
?>
<div class="ecommerce-widget">
            <div class="akun-update">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
