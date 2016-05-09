<?php

use backend\models\HtmlBox;
use backend\models\PageGroup;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model HtmlBox */
/* @var $form ActiveForm */
?>

<div class="html-box-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
        <?php echo $form->field($model, 'page_group_ids')->widget(Select2::classname(), [
            'data' => PageGroup::arrayIdToName(),
            'language' => 'vi',
            'options' => [
                'placeholder' => '- Chọn -',
                'multiple' => true
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'is_active')->checkbox() ?>
    </div>
    <div class="col-md-6">
        <?php // echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        <?= $form->field($model, 'place')->textInput() ?>
        <?= $form->field($model, 'position')->textInput() ?>
        <?php // echo $form->field($model, 'status')->textInput() ?>
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
    </div>
    
    <div class="col-md-12">
        <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'preset' => 'full',
            'clientOptions' => [
                'height' => 400,
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
