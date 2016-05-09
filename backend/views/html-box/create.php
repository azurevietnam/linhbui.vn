<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HtmlBox */

$this->title = 'Create Html Box';
$this->params['breadcrumbs'][] = ['label' => 'Html Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="html-box-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
