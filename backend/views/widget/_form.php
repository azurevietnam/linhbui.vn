<?php

use backend\models\Widget;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Widget */
/* @var $form ActiveForm */
?>

<div class="widget-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12 row">
        <fieldset class="col-md-6">
            <legend>Các trang đặt Widget</legend>
            <?php echo $form->field($model, 'page_group_ids')->widget(Select2::classname(), [
                'data' => backend\models\PageGroup::arrayIdToName(),
                'language' => 'vi',
                'options' => [
                    'placeholder' => '- Chọn -',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </fieldset>
        <fieldset class="col-md-6">
            <legend>Vị trí đặt Widget</legend>
            <?= $form->field($model, 'place')->dropDownList(Widget::$places, ['prompt' => 'Chọn']) ?>
            <?= $form->field($model, 'position')->textInput() ?>
        </fieldset>
    </div>
    <div class="col-md-12 row">
        <fieldset class="col-md-6">
            <legend>Thuộc tính Widget</legend>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'template')->textarea(['maxlength' => true, 'rows' => 8, 'style' => 'resize:vertical', 'spellcheck' => 'false']) ?>
            <?= $form->field($model, 'style')->textarea(['maxlength' => true, 'rows' => 12, 'style' => 'resize:vertical', 'spellcheck' => 'false']) ?>
            <?= $form->field($model, 'is_active')->checkbox() ?>
        </fieldset>
        <fieldset class="col-md-6">
            <legend>Thuộc tính các Item trong Widget</legend>
            <?= $form->field($model, 'object_class')->dropDownList(Widget::$object_classes, ['prompt' => 'Chọn']) ?>
            <?= $form->field($model, 'item_template')->textarea(['maxlength' => true, 'rows' => 8, 'style' => 'resize:vertical', 'spellcheck' => 'false']) ?>
            <?php // echo $form->field($model, 'sql_offset')->textInput() ?>
            <?= $form->field($model, 'item_image_size')->dropDownList(array_combine(array_keys(Widget::$image_resizes), array_keys(Widget::$image_resizes)), ['prompt' => 'Chọn']) ?>
            <?= $form->field($model, 'sql_limit')->textInput() ?>
            <?= $form->field($model, 'sql_order_by')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'sql_where')->textInput(['maxlength' => true]) ?>
            <?php // echo $form->field($model, 'status')->textInput() ?>
        </fieldset>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php echo Html::a('Xem trước', ['preview', 'back_url' => Url::current()], ['target' => '_blank', 'class' => 'btn btn-info', 'id' => 'preview-bt']) ?>
            
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$template_buttons = '<div class=\"my-buttons\">';
foreach (Widget::$template_variables as $key => $name) {
    $template_buttons .= "<button class=\\\"btn btn-md btn-default\\\" type=\\\"button\\\" value=\\\"$key\\\" data-toggle=\\\"tooltip\\\" title=\\\"$key\\\">$name</button>";
}
$template_buttons .= '</div>';

$item_template_buttons = '<div class=\"my-buttons\">';
foreach (Widget::$item_template_variables as $key => $name) {
    $item_template_buttons .= "<button class=\\\"btn btn-md btn-default\\\" type=\\\"button\\\" value=\\\"$key\\\" data-toggle=\\\"tooltip\\\" title=\\\"$key\\\">$name</button>";
}
$item_template_buttons .= '</div>';

$this->registerCss('
.my-buttons button {
    margin: 0 1px 1px 0;
    padding: 3px 6px;
    border-radius: 0px;
}
');

$this->registerJs('
$("[data-toggle=\"tooltip\"]").tooltip();
$("' . $template_buttons . '").insertBefore($("#widget-template"));
$("' . $item_template_buttons . '").insertBefore($("#widget-item_template"));
$(".my-buttons").children("button").click(function(){
    var bt = $(this);
    var text = bt.parent(".my-buttons").next();
    text.insertAtCaret(bt.val());
});

//////////////////////
// fn insertAtCaret //
//////////////////////
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


$("#preview-bt").click(function(){
    var a = $(this);
    $.post(
        "' . Url::toRoute(['widget/save-preview-data']) . '",
        {
            "data": $("#w0").serialize()
        },function(data, textStatus, jqXHR){
            if (data == true) {
//                if (confirm("Dữ liệu đã được gửi, Ok để xem trước")) {
                    location.href = a.attr("href");
//                }
            } else {
                alert(data);
            }
        }
    ).fail(function(jqXHR, textStatus, errorThrown){
        alert("Không gửi được dữ liệu");
    });
    return false;
});
');