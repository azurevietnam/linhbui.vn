<?php

use backend\models\ArticleCategorySearch;
use backend\models\ArticleCategory;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ArticleCategorySearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Danh mục tin tức';
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>
<div class="article-category-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article Category', ['create'], ['class' => 'btn btn-success']) ?>
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
//            'old_slugs',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->name, $model->getLink(), ['style'=>'color:#04a', 'target' => '_blank']);
                },
            ],
            'slug',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->parent ? $model->parent->name : '';
                },
                'filter' => Html::activeDropDownList($searchModel, 'parent_id', $this->context->nca, ['class'=>'form-control', 'prompt' => '']),
            ],
            // 'description',
            // 'long_description:ntext',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',
//             'h1',
            // 'banner',
            // 'image_path',
            // 'status',
            // 'is_hot',
             'position',
//            [
//                'attribute' => 'created_at',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return date('Y-m-d H:i', $model->created_at);
//                },
//            ],
            // 'updated_at',
//             'created_by',
            // 'updated_by',
//            [
//                'attribute' => 'status',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    if (isset(ArticleCategory::$statuses[$model->status])) {
//                        $status = ArticleCategory::$statuses[$model->status];
//                        return Html::tag('span',  $status, ['class' => 'text-default']);
//                    }
//                },
//                'filter' => Html::activeDropDownList($searchModel, 'status', ArticleCategory::$statuses, ['class'=>'form-control', 'prompt' => '']),
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
