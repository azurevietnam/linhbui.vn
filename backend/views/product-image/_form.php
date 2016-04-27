<?php

use backend\models\ProductImage;
use kartik\color\ColorInput;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ProductImage */
/* @var $form ActiveForm */
?>

<div class="product-image-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
		<?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
		<?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
		<?php /* echo $form->field($model, 'color_code')->widget(ColorInput::classname(), [
            'options' => [
                'readonly' => true,
                'placeholder' => '- Chọn -'
            ],
//            'showDefaultPalette' => false,
            'pluginOptions' => [
//                'showInput' => true,
//                'showInitial' => true,
//                'showPalette' => true,
//                'showPaletteOnly' => true,
//                'showSelectionPalette' => true,
//                'showAlpha' => false,
//                'allowEmpty' => false,
//                'preferredFormat' => 'name',
//                'palette' => [
//                    ["white", "black", "grey", "silver", "gold", "brown"],
//                    ["red", "orange", "yellow", "indigo", "maroon", "pink"],
//                    ["blue", "green", "violet", "cyan", "magenta", "purple"],
//                ]                
            ]
        ]) */ ?>
		<?= $form->field($model, 'product_id')->textInput(['readonly' => true, 'type' => 'hidden'])->label(false) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
