<?php

use backend\models\ProductCategorySearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ProductCategorySearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
                    return Html::img($model->getImage(), ['style'=>'max-height:100px;max-width:100px']);
                },
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, $model->getLink(), ['style'=>'color:#04a', 'target' => '_blank']);
                },
            ],
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->parent ? $model->parent->name : 'N/A';
                },
            ],
//            'old_slugs',
//            'position',
            // 'image_path',
            // 'image',
            // 'banner',
//            [
//                'attribute' => 'created_at',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return date('Y-m-d H:i', $model->created_at);
//                },
//            ],
//             'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'link',
            // 'status',
//            [
//                'attribute' => 'status',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    if (isset(ProductCategory::$statuses[$model->status])) {
//                        $status = ProductCategory::$statuses[$model->status];
//                        return Html::tag('span',  $status, ['class' => 'text-default']);
//                    }
//                },
//                'filter' => Html::activeDropDownList($searchModel, 'status', ProductCategory::$statuses, ['class'=>'form-control', 'prompt' => '']),
//            ],
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
