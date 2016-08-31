<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdsenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adsenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsense-index">
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adsense', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'image',
            'image_path',
            'caption',
            'link',
            // 'type',
            // 'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
