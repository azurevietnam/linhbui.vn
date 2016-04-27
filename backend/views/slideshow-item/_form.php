<?php

use backend\models\SlideshowItem;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model SlideshowItem */
/* @var $form ActiveForm */
?>

<div class="slideshow-item-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
		<?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
		<?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
		<?= $form->field($model, 'is_active')->checkbox() ?>
    </div>
    <div class="col-md-6">
		<?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'position')->textInput() ?>
		<?php // echo $model->created_at = $model->isNewRecord ? date('Y-m-d H:i:00') : date('Y-m-d H:i:s', $model->created_at) ?>
		<?php /* echo $form->field($model, 'created_at')->widget(DateTimePicker::className(), [
			'pluginOptions' => [
				'language' => 'vi',
				'todayBtn' => true,
				'autoclose' => true,
				'format' => 'yyyy-mm-dd hh:ii:00',
			],
		]) */ ?>
		<?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? $username : $model->created_by ]) ?>
		<?php // echo $model->updated_at = !$model->isNewRecord ? date('Y-m-d H:i:00') : null ?>
		<?php /* echo $form->field($model, 'updated_at')->widget(DateTimePicker::className(), [
			'pluginOptions' => [
				'language' => 'vi',
				'todayBtn' => true,
				'autoclose' => true,
				'format' => 'yyyy-mm-dd hh:ii:00',
			],
		]) */ ?>
		<?php // echo $form->field($model, 'updated_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => !$model->isNewRecord ? $username : '' ]) ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
