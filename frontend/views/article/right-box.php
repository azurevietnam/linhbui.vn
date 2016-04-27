<?php
$news = \frontend\models\Article::getArticles(['orderBy' => 'published_at desc', 'limit' => 6]);
?>
<div class="right_new left_bar">
    <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
    <div class="post_new clearfix">
        <div class="top-bar"><h2 class="s14">bài viết mới</h2></div>
        <ul class="list magb10 clearfix">
            <?php
            foreach ($news as $item) {
            ?>
            <li class="clearfix"><h3><?= $item->a() ?></h3></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>