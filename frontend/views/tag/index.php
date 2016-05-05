<div class="col-l">
    <div class="listArticles clearfix">
        <div class="row-fluid clearfix">

            <div class="list-news-other col-2 clearfix">
                <ul class="list_col list-unstyle clearfix">
                    <?php
                    foreach (array_slice($items, 0, $items_per_page) as $item) {
                    ?>
                    <li class="thumb clearfix">
                        <h3 class="title-news">
                            <?= $item->a([], "<strong>$item->name</strong>") ?>
                        </h3>
                        <?= $item->a(['class' => 'cover'], $item->img()) ?>
                        <div class="magl">
                            <p class="desc"><?= $item->desc() ?></p>
                            <p class="clearfix info-post">
                                <time class="fl"><em class="ic-lock"></em><?= $item->date() ?></time>
                                <span class="fl comment"><em class="ic-comment"></em><?= $item->comment_count ?></span>
                                <span class="fl views"><em class="ic-views"></em><?= $item->view_count ?></span>
                            </p>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                if (isset($items[$items_per_page])) {
                ?>
                <div class="load-more-wrap"><a class="ajax_load_more" href="<?= \yii\helpers\Url::current(['page' => $page + 1]) ?>">Xem thêm<i class="ic-down"></i></a></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>