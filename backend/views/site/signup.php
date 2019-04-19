<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup">
    <span class="login100-form-title p-b-26">
        <?= Html::encode($this->title) ?>
    </span>
    <span class="login100-form-title p-b-26">
        <?= Html::encode(Yii::$app->name) ?>
    </span>
    <br />

    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'login100-form']); ?>


        <?= $form->field($model, 'username',[
                        'template' => '<div class="wrap-input100 ">
                                            {input}
                                            <span class="focus-input100" data-placeholder="Username"></span>
                                        </div>'
                                        ])->textInput(['class'=>'input100', 'autofocus'=>true]); ?>

<?= $form->field($model, 'nama',[
                        'template' => '<div class="wrap-input100 ">
                                            {input}
                                            <span class="focus-input100" data-placeholder="Nama Lengkap"></span>
                                        </div>'
                                        ])->textInput(['class'=>'input100', 'autofocus'=>true]); ?>

        <?= $form->field($model, 'password',[
                        'template' => '<div class="wrap-input100 ">
                                            <span class="btn-show-pass">
                                                <i class="zmdi zmdi-eye"></i>
                                            </span>
                                            {input}
                                            <span class="focus-input100" data-placeholder="Password"></span>
                                        </div>'
                                        ])->passwordInput(['class'=>'input100']); ?>


        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <?= Html::submitButton(Html::encode($this->title), ['class' => 'login100-form-btn', 'name' => 'signup-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>


    <div class="text-center p-t-115">
        <span class="txt1">
            Di sini untuk
        </span>
        <?= Html::a('Login', ['/site/login'], ['class' => 'txt2']) ?>
    </div>  
</div>