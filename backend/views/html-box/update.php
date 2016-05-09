<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HtmlBox */

$this->title = 'Update Html Box: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Html Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="html-box-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
