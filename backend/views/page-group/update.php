<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PageGroup */

$this->title = 'Update Page Group: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Page Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-group-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
