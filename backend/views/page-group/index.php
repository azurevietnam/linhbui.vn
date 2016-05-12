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

            'name',
            [
                'attribute' => 'route',
                'format' => 'raw',
                'value' => function($model) {
                    if (isset(backend\models\PageGroup::$routes[$model->route])) {
                        return backend\models\PageGroup::$routes[$model->route];
                    } else {
                        return $model->route;
                    }
                }
            ],
            [
                'attribute' => 'url_params',
                'format' => 'raw',
                'value' => function($model) {
                    $result = '<table>';
                    foreach ((array) json_decode($model->url_params) as $param => $value) {
                        $label = $param;
                        foreach (backend\models\PageGroup::$all_url_params as $id => $item) {
                            if ($item['name'] == $param) {
                                $label = $item['label'];
                                break;
                            }
                        }
                        if ($value != '') {
                            $result .= "<tr><td>$label</td><td>$value</td></tr>";
                        }
                    }
                    return "$result</table>";
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
