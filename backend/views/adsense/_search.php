<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdsenseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adsense-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'image_path') ?>

    <?= $form->field($model, 'caption') ?>

    <?= $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
