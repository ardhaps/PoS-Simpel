<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Detailpesanan */

$this->title = 'Create Detailpesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailpesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
