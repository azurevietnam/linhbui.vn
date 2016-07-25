<?php

use backend\models\Article;
use backend\models\PageGroup;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model PageGroup */
/* @var $form ActiveForm */
?>

<div class="page-group-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'route')->dropDownList(PageGroup::$routes, ['prompt' => 'Chọn']) ?>
    </div>
    <div class="col-md-6">
        <?php
        $model->isNewRecord ?: $model->url_params = (array) json_decode($model->url_params);
        foreach (PageGroup::$all_url_params as $item) {
//            if ($item['name'] == PageGroup::URL_TYPE) {
//                echo $form->field($model, "url_params[{$item['name']}]")->dropDownList(Article::$types, ['prompt' => '- Chọn -'])->label($item['label']);
//            } else {
                echo $form->field($model, "url_params[{$item['name']}]")->textInput(['maxLength' => true])->label($item['label']);
//            }
        }
        ?>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
