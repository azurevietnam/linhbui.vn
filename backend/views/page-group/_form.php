<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\PageGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-group-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?php
        $model->isNewRecord ?: $model->url_params = (array) json_decode($model->url_params);
        foreach (backend\models\PageGroup::$all_url_params as $name => $label) {
        ?>
        <?= $form->field($model, "url_params[$name]")->textInput(['maxLength' => true])->label($label) ?>
        <?php
        }
        ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
