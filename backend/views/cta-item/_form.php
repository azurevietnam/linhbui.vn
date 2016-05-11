<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\CtaItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cta-item-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
	<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
	<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? $username : $model->created_by ]) ?>
	<?php // echo $form->field($model, 'updated_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => !$model->isNewRecord ? $username : '' ]) ?>
	<?php // $model->created_at = $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s', $model->created_at) ?>
	<?php /* echo $form->field($model, 'created_at')->widget(TimePicker::className(), [
		'language' => 'vi',
		'mode' => 'datetime',
		'clientOptions' => [
			'dateFormat' => 'yy-mm-dd',
			'timeFormat' => 'HH:mm:ss',
			'showSecond' => true,
		],
	]) */ ?>
	<?php // $model->updated_at = !$model->isNewRecord ? date('Y-m-d H:i:s') : null ?>
	<?php /* echo $form->field($model, 'updated_at')->widget(TimePicker::className(), [
		'language' => 'vi',
		'mode' => 'datetime',
		'clientOptions' => [
			'dateFormat' => 'yy-mm-dd',
			'timeFormat' => 'HH:mm:ss',
			'showSecond' => true,
		],
	]) */ ?>
	<?= $form->field($model, 'is_active')->checkbox() ?>
	<?php // echo $form->field($model, 'status')->textInput() ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
