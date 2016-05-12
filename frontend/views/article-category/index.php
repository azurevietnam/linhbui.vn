<?php

use frontend\models\Article;
use yii\helpers\Url;
$item_per_line = 2;
?>
<div class="col-l">
    <div class="listArticles clearfix">
        <div class="row-fluid clearfix">

            <div class="list-news-other col-2 clearfix">
                <?php
                if (isset($items[0])) {
                ?>
                <article class="post fl">
                    <h2 class="title-news">
                        <?= $items[0]->a([], "<strong>{$items[0]->name}</strong>") ?>
                    </h2>
                    <?= $items[0]->a(['class' => 'cover'], $items[0]->img([], Article::IMAGE_MEDIUM)) ?>
                    <p class="clearfix info-post">
                        <time class="fl"><em class="ic-lock"></em><?= $items[0]->date() ?></time>
                        <span class="fl comment"><em class="ic-comment"></em><?= $items[0]->comment_count ?></span>
                        <span class="fl views"><em class="ic-views"></em><?= $items[0]->view_count ?></span>
                    </p>
                    <p class="desc">
                        <?= $items[0]->desc() ?>
                    </p>
                </article>
                <?php
                }
                ?>
                <?php
                if (isset($items[1])) {
                ?>
                <article class="post fr">
                    <h2 class="title-news">
                        <?= $items[1]->a([], "<strong>{$items[1]->name}</strong>") ?>
                    </h2>
                    <?= $items[1]->a(['class' => 'cover'], $items[1]->img([], Article::IMAGE_MEDIUM)) ?>
                    <p class="clearfix info-post">
                        <time class="fl"><em class="ic-lock"></em><?= $items[1]->date() ?></time>
                        <span class="fl comment"><em class="ic-comment"></em><?= $items[1]->comment_count ?></span>
                        <span class="fl views"><em class="ic-views"></em><?= $items[1]->view_count ?></span>
                    </p>
                    <p class="desc">
                        <?= $items[1]->desc() ?>
                    </p>
                </article>
                <?php
                }
                ?>
                <ul class="list_col list-unstyle clearfix">
                    <?php
                    $i = 0;
                    foreach (array_slice($items, 2, $items_per_page - 2) as $item) {
                        $i++;
                    ?>
                    <li class="thumb clearfix">
                        <h3 class="title-news">
                            <?= $item->a([], "<strong>$item->name</strong>") ?>
                        </h3>
                        <?= $item->a(['class' => 'cover'], $item->img([], Article::IMAGE_SMALL)) ?>
                        <div class="magl">
                            <p class="desc"><?= $item->desc() ?></p>
                            <p class="clearfix info-post">
                                <time class="fl"><em class="ic-lock"></em><?= $item->date() ?></time>
                                <span class="fl comment"><em class="ic-comment"></em><?= $item->comment_count ?></span>
                                <span class="fl views"><em class="ic-views"></em><?= $item->view_count ?></span>
                            </p>
                        </div>
                    </li>
                    <?= $i % $item_per_line == 0 ? '<div class=clearfix></div>' : '' ?>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                if (isset($items[$items_per_page])) {
                ?>
                <div class="load-more-wrap"><a class="ajax_load_more" href="<?= Url::current(['page' => $page + 1]) ?>">Xem thêm<i class="ic-down"></i></a></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>