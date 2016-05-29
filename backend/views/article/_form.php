<?php

use backend\models\Article;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Article */
/* @var $form ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
            <?= $form->field($model, 'type')->dropDownList(Article::$types) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?php // echo $form->field($model, 'article_category_ids')->dropDownList($this->context->ncac, ['prompt' => '']) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            <?php // echo $form->field($model, 'old_slugs')->textInput(['maxlength' => true, 'readonly' => true]) ?>
            <?= $form->field($model, 'image', ['template' => '{label}<div class="picturecut_image_container" ' . (!$model->isNewRecord ? 'style="background-image:url(' . $model->getImage() . ')"' : '') . '></div>{input}{error}{hint}'])->textInput(['maxlength' => true, 'readonly' => true]) ?>
            <?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?php $model->published_at = $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s', $model->published_at) ?>
            <?= $form->field($model, 'published_at')->widget(TimePicker::className(), [
            'language' => 'vi',
            'mode' => 'datetime',
            'clientOptions'=>[
                'dateFormat' => 'yy-mm-dd',
                'timeFormat' => 'HH:mm:ss',
                'showSecond' => true,
            ]
        ]) ?>
        <?php // !$model->isNewRecord or $model->is_active = 1 ?>
		<?php // echo $form->field($model, 'is_hot')->checkbox() ?>
		<?= $form->field($model, 'is_active')->checkbox() ?>
    </div>
    <div class="col-md-6">
		<?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'meta_keywords')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
        <?= $form->field($model, 'meta_description')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
		<?= $form->field($model, 'description')->textarea(['maxlength' => true, 'style' => 'resize:vertical']) ?>
        <?php echo $form->field($model, 'tag_ids')->widget(Select2::classname(), [
            'data' => $this->context->tags_idToName,
            'language' => 'vi',
            'options' => [
//                'placeholder' => '- Chọn -',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
		<?php // echo $form->field($model, 'view_count')->textInput() ?>
		<?php // echo $form->field($model, 'like_count')->textInput() ?>
		<?php // echo $form->field($model, 'comment_count')->textInput() ?>
		<?php // echo $form->field($model, 'share_count')->textInput() ?>
		<?php // echo $model->created_at = $model->isNewRecord ? date('Y-m-d H:i:00') : date('Y-m-d H:i:s', $model->created_at) ?>
		<?php /* echo $form->field($model, 'created_at')->widget(DateTimePicker::className(), [
			'pluginOptions' => [
				'language' => 'vi',
				'todayBtn' => true,
				'autoclose' => true,
				'format' => 'yyyy-mm-dd hh:ii:00',
			],
		]) */ ?>
		<?php // echo $model->updated_at = !$model->isNewRecord ? date('Y-m-d H:i:00') : null ?>
		<?php /* echo $form->field($model, 'updated_at')->widget(DateTimePicker::className(), [
			'pluginOptions' => [
				'language' => 'vi',
				'todayBtn' => true,
				'autoclose' => true,
				'format' => 'yyyy-mm-dd hh:ii:00',
			],
		]) */ ?>
		<?php // echo $form->field($model, 'created_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $model->isNewRecord ? $username : $model->created_by ]) ?>
		<?php // echo $form->field($model, 'updated_by')->textInput(['maxlength' => true, 'readonly' => true, 'value' => !$model->isNewRecord ? $username : '' ]) ?>
		<?php // echo $form->field($model, 'auth_alias')->textInput(['maxlength' => true]) ?>
		<?php // echo $form->field($model, 'position')->textInput() ?>
		<?php // echo $form->field($model, 'status')->textInput() ?>
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

    </div>
    
    <div class="col-md-12">
		<?= $form->field($model, 'content')->widget(CKEditor::className(), [
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
