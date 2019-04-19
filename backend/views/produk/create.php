<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\produk */

$this->title = 'Produk Baru';
?>
            <div class="ecommerce-widget">
                <div class="produk-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>