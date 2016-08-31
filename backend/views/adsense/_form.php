<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Adsense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adsense-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
	<?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
    </div>
    <div class="col-md-6">
	<?= $form->field($model, 'type')->dropDownList(backend\models\Adsense::$types, ['prompt' => 'Chọn']) ?>
	<?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'is_active')->checkbox() ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
