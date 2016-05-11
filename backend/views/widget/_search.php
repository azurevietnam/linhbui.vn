<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WidgetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'page_group_id') ?>

    <?= $form->field($model, 'place') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'item_image_size') ?>

    <?php // echo $form->field($model, 'item_template') ?>

    <?php // echo $form->field($model, 'style') ?>

    <?php // echo $form->field($model, 'object_class') ?>

    <?php // echo $form->field($model, 'sql_offset') ?>

    <?php // echo $form->field($model, 'sql_limit') ?>

    <?php // echo $form->field($model, 'sql_order_by') ?>

    <?php // echo $form->field($model, 'sql_where') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
