<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adsense */

$this->title = 'Create Adsense';
$this->params['breadcrumbs'][] = ['label' => 'Adsenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsense-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'username' => $username,
        'model' => $model,
    ]) ?>

</div>
