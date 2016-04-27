<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-file-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
	<?= $form->field($model, 'product_version')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'product_ref_url')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'extension')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'file_size')->textInput() ?>
	<?php // echo $form->field($model, 'file_src')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
	<?= $form->field($model, 'os_id')->dropDownList(backend\models\ProductFile::$oses, ['prompt' => 'Chọn']) ?>
	<?= $form->field($model, 'os_version')->textInput(['maxlength' => true]) ?>
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
	<?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? $username : $model->created_by ]) ?>
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
	<?php // echo $form->field($model, 'updated_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => !$model->isNewRecord ? $username : '' ]) ?>
	<?= $form->field($model, 'product_id')->textInput(['readonly' => true, 'type' => 'hidden'])->label(false) ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
