<?php

use frontend\models\Article;
use frontend\models\ArticleCategory;

?>
<aside class="col-r">
    <?php if (in_array(Yii::$app->controller->id, ['article', 'article-category'])) { ?>
    <div class="banner-r">
        <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
    </div>
    <div class="title"><span class="ic-bullet2"></span><strong>Bài viết quan tâm</strong></div>
    <ul class="list-unstyle list-news-thumb">
        <?php foreach (Article::getArticles(['limit' => 5, 'orderBy' => 'rand()']) as $item) {
            $item->getImage('--120x120');
            ?>
        <li class="clearfix">
            <?= $item->a(null, "<span class=\"fl image\">{$item->img()}</span><strong>{$item->name}</strong>") ?>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
    <div class="title"><span class="ic-bullet2"></span><strong>Điểm thi lớp 10 tỉnh thành</strong></div>
    <ul class="list-unstyle citys-news">
    <?php
    $articleCategories = ArticleCategory::getArticleCategories([/*'offset' => \frontend\models\Menu::LIMIT, */'orderBy' => 'is_hot desc, position asc']);
    foreach ($articleCategories as $item) {
    ?>    <li><a href="<?= $item->getLink() ?>" title="<?= $item->name ?>"><strong><?= $item->name ?></strong></a></li>
    <?php 
    } 
    ?></ul>
</aside>