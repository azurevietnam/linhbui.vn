<?php
isset($items) or $items = \frontend\models\Article::find()->orderBy('rand()')->limit(6)->allPublished();
?>
<div class="right_new left_bar">
    <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
    <div class="post_new clearfix">
        <div class="top-bar"><h2 class="s14">Bài viết mới</h2></div>
        <ul class="list magb10 clearfix">
            <?php
            foreach ($items as $item) {
            ?>
            <li class="clearfix"><h3><?= $item->a() ?></h3></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>