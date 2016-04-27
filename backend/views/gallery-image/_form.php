<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\GalleryImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-image-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
	<?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>
    <div class="col-md-6">
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'caption')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
	<?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
	<?= $form->field($model, 'position')->textInput() ?>
	<?= $form->field($model, 'gallery_id')->textInput(['readonly' => true, 'type' => 'hidden'])->label(false) ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
