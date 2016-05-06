<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Widget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
	<?= $form->field($model, 'place')->dropDownList(\backend\models\Widget::$places, ['prompt' => 'Chọn']) ?>
	<?= $form->field($model, 'position')->textInput() ?>
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'template')->textarea(['maxlength' => true, 'rows' => 8, 'style' => 'resize:vertical', 'class' => 'form-control my-template']) ?>
	<?= $form->field($model, 'item_template')->textarea(['maxlength' => true, 'rows' => 8, 'style' => 'resize:vertical', 'class' => 'form-control my-template']) ?>
	<?= $form->field($model, 'style')->textarea(['maxlength' => true, 'rows' => 8, 'style' => 'resize:vertical']) ?>
	<?= $form->field($model, 'object_class')->dropDownList(\backend\models\Widget::$object_classes, ['prompt' => 'Chọn']) ?>
	<?= $form->field($model, 'sql_offset')->textInput() ?>
	<?= $form->field($model, 'sql_limit')->textInput() ?>
	<?= $form->field($model, 'sql_order_by')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'sql_where')->textInput(['maxlength' => true]) ?>
	<?php // echo $form->field($model, 'status')->textInput() ?>
	<?= $form->field($model, 'is_active')->checkbox() ?>
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
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$variables = \backend\models\Widget::$variables;
$bts = '<div class=\"my-bts\">';
$hightlight = '';
foreach ($variables as $key => $name) {
    $bts .= "<button type=\\\"button\\\" value=\\\"$key\\\">$name</button>";
    $hightlight .= "$key|";
}
$hightlight = rtrim($hightlight, '|');
$bts .= '</div>';
$this->registerJs('
$("textarea.my-template").each(function(){
    var text = $(this);
    $("' . $bts . '").insertBefore(text);
//    var newText = text.val().replace(/' . $hightlight . '/gi, function myFunction(x){return "<mark>" + x + "</mark>";});
//    $("<div class=\"backdrop\">" + newText + "</div>").insertBefore(text);
});
$(".my-bts").children("button").click(function(){
    var bt = $(this);
    var text = bt.parent().next();
    text.insertAtCaret(bt.val());
});

////////////////////
// fn insertAtCaret:
jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      //For browsers like Internet Explorer
      this.focus();
      var sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == "0") {
      //For browsers like Firefox and Webkit based
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  });
}
});

');
$this->registerCss('
.my-template {
        padding: 6px 12px;
}
.backdrop {
    padding: 6px 12px;
    position: absolute;
    z-index: 1;
    border: 1px solid #685972;
    background-color: transparent;
    overflow: auto;
    pointer-events: none;
    white-space: pre-wrap;
    word-wrap: break-word;
    color: #e00;
    width: calc(100%);
}
.backdrop mark {
    padding: 0 !important;
    margin: 0 !important;
}
');