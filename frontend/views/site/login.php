<?php

/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

use common\models\LoginForm;
use frontend\models\I18n;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = I18n::t('b_login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>Please fill out the following fields to login:</p>-->

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= I18n::t('b_if_you_forgot_password') ?> <?= Html::a(I18n::t('b_click_here'), ['site/request-password-reset'], ['style' => 'color:#0084b4']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton(I18n::t('b_login'), ['name' => 'login-button', 'class' => 'my-form-bt']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
