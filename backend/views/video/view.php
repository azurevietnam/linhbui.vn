<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Video */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'old_slugs',
            'source',
            'description',
            'meta_description',
            'meta_title',
            'meta_keywords',
            'page_title',
            'h1',
            'image',
            'image_path',
            'status',
            'is_hot',
            'is_active',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'published_at',
            'view_count',
            'comment_count',
            'like_count',
            'share_count',
            'long_description:ntext',
        ],
    ]) ?>

</div>
