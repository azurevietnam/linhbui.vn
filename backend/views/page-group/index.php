<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Page Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-group-index">
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'route',
//            'url_regexp:url',
            'url_params',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>