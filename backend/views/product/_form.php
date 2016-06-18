<?php

use backend\models\Product;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;
use kartik\rating\StarRating;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Product */
/* @var $form ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?php // echo $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        <?php echo $form->field($model, 'product_category_ids')->widget(Select2::classname(), [
            'data' => \backend\models\ProductCategory::noContainsProductCategories(),
            'language' => 'vi',
            'options' => [
                'placeholder' => '- Chọn -',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?php // echo $form->field($model, 'old_slugs')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?php // echo $form->field($model, 'banner', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getBanner() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?= $form->field($model, 'price')->textInput()->label() ?>
        <?= $form->field($model, 'original_price')->textInput()->label() ?>
        <?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?php $model->published_at = $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s', $model->published_at) ?>
        <?= $form->field($model, 'published_at')->widget(TimePicker::className(), [
            'language' => 'vi',
            'mode' => 'datetime',
            'clientOptions' => [
                'dateFormat' => 'yy-mm-dd',
                'timeFormat' => 'HH:mm:ss',
                'showSecond' => true,
            ],
        ]) ?>
        <?php // echo $form->field($model, 'is_hot')->checkbox() ?>
        <?= $form->field($model, 'is_active')->checkbox() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'meta_keywords')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
        <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
        <?= $form->field($model, 'meta_description')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
        <?php /* echo $form->field($model, 'tag_ids')->widget(Select2::classname(), [
            'data' => \backend\models\Tag::arrayIdToName(),
            'language' => 'vi',
            'options' => [
                'placeholder' => '- Chọn -',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); */ ?>
        <?php // echo $form->field($model, 'position')->textInput() ?>
        <?php // $form->field($model, 'view_count')->textInput() ?>
        <?php // $form->field($model, 'like_count')->textInput() ?>
        <?php // $form->field($model, 'share_count')->textInput() ?>
        <?php // $form->field($model, 'comment_count')->textInput() ?>
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
        <?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? $username : $model->created_by ]) ?>
        <?php // echo $form->field($model, 'updated_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => !$model->isNewRecord ? $username : '' ]) ?>
        <?php // $form->field($model, 'available_quantity')->textInput() ?>
        <?php // $form->field($model, 'order_quantity')->textInput() ?>
        <?php // $form->field($model, 'sold_quantity')->textInput() ?>
        <?php // $form->field($model, 'total_quantity')->textInput() ?>
        <?php // $form->field($model, 'total_revenue')->textInput() ?>
        <?php // echo $form->field($model, 'manufacturer')->textInput() ?>
        <?php
        if ($model->isNewRecord) {
//            $model->price = 0;
//            $model->original_price = 0;
            $model->review_score = 0;
        }
        ?>
        <?php /*
        echo $form->field($model, 'review_score', ['template' => '{label}<code style="display:none"></code>{input}{error}{hint}'])->widget(StarRating::classname(), [
            'pluginOptions' => [
                'size'=>'sm',
                'stars' => 5,
                'min' => 0,
                'max' => 10,
                'step' => 0.1,
                'showClear' => false,
                'showCaption' => false,
            ],
        ]); */
        ?>
        <?= $form->field($model, 'malterial')->textInput()->label() ?>
        <?= $form->field($model, 'color')->textInput()->label() ?>
        <?= $form->field($model, 'style')->textInput()->label() ?>
        <?php // $form->field($model, 'status')->textInput() ?>
    </div>
    
    <div class="col-md-12">
        <?php /* echo $form->field($model, 'long_description')->widget(CKEditor::className(), [
            'preset' => 'full',
            'clientOptions' => [
                'height' => 400,
                'language' => 'vi',
                'uiColor' => '#E4E4E4',
                'image_previewText' => '&nbsp;',
                'filebrowserUploadUrl' => Url::to(['file/ckeditor-upload-image'], true),
            ],
        ]) */ ?>
        <?= $form->field($model, 'details')->widget(CKEditor::className(), [
            'preset' => 'full',
            'clientOptions' => [
                'height' => 500,
                'language' => 'vi',
                'uiColor' => '#E4E4E4',
                'image_previewText' => '&nbsp;',
                'filebrowserUploadUrl' => Url::to(['file/ckeditor-upload-image'], true),
            ],
        ]) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
