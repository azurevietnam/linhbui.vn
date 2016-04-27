<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProductFile */

$this->title = 'Create Product File';
$this->params['breadcrumbs'][] = ['label' => 'Product Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-file-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
