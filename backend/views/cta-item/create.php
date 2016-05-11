<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CtaItem */

$this->title = 'Create Cta Item';
$this->params['breadcrumbs'][] = ['label' => 'Cta Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cta-item-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
