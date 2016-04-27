<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-file-index">
<!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'product_id',
            'product_ref_url:url',
            'product_version',
//            'filename',
            // 'extension',
            // 'size',
            // 'file_src',
            // 'os_id',
            [
                'attribute' => 'os_id',
                'format' => 'raw',
                'value' => function($model) {
                    if (isset(backend\models\ProductFile::$oses[$model->os_id])) {
                        return backend\models\ProductFile::$oses[$model->os_id];
                    } else {
                        return $model->os_id;
                    }
                }
            ],
             'os_version',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
