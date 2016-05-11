<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CtaItem */

$this->title = 'Update Cta Item: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cta Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cta-item-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
