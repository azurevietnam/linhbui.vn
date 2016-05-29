<?php

use backend\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\User;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ProductSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img($model->getImage(), ['style'=>'max-height:60px;max-width:60px']);
                },
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, $model->getLink(), ['style'=>'color:#04a', 'target' => '_blank']);
                },
            ],
//            'content:ntext',
            'slug',
            [
                'attribute' => 'product_category_ids',
                'format' => 'raw',
                'value' => function ($model) {
                    return implode(';', ArrayHelper::getColumn($model->productCategories, 'name'));
                },
            ],
//            'code',
//            'slug',
//            'old_slugs',
            // 'price',
            // 'original_price',
            // 'banner',
            // 'image_path',
            // 'details:ntext',
            // 'description',
            // 'long_description:ntext',
            // 'page_title',
            // 'h1',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',
            // 'is_hot',
            // 'status',
            // 'position',
            // 'view_count',
            // 'like_count',
            // 'share_count',
            // 'comment_count',
            [
                'attribute' => 'published_at',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->published_at <= strtotime('now')) {
                        return Html::tag('span', date('Y-m-d H:i', $model->published_at), ['class' => 'text-black']);
                    } else {
                        return Html::tag('span', '<span class="fa fa-clock-o"></span> ' . date('Y-m-d H:i', $model->published_at), ['class' => 'label label-warning']);
                    }
                },
            ],
//            [
//                'attribute' => 'created_at',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return date('Y-m-d H:i', $model->created_at);
//                },
//            ],
            // 'updated_at',
            [
                'attribute' => 'created_by',
                'filter' => Html::activeDropDownList($searchModel, 'created_by', ArrayHelper::merge(ArrayHelper::map(User::find()->asArray()->all(), 'username', 'username'), [0 => 'N/A']), ['class'=>'form-control', 'prompt' => '']),
            ],
            // 'updated_by',
            // 'available_quantity',
            // 'order_quantity',
            // 'sold_quantity',
            // 'total_quantity',
            // 'total_revenue',
            [
                'attribute' => 'is_active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_active === 1 ? Html::tag('span', 'Ok', ['class' => 'label label-info']) : Html::tag('span', '<span class="fa fa-close"></span>', ['class' => 'label label-danger']);
                },
            ],
            [
                'attribute' => 'is_hot',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_hot === 1 ? Html::tag('span', 'Hot', ['class' => 'label label-warning']) : Html::tag('span', '<span class="fa fa-close"></span>', ['class' => 'label label-default']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
