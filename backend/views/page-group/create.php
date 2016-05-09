<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PageGroup */

$this->title = 'Create Page Group';
$this->params['breadcrumbs'][] = ['label' => 'Page Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-group-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
