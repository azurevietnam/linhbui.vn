<div class="ads txt-center magT10">
    <p class="magb5"><?= $this->render('//modules/adsense') ?></p>
</div>
<div class="application magT5 bottom25 clearfix">
    <div class="single-block new_update">
        <h2 class="top-bar">Mới cập nhật</h2>
        <?= $this->render('//product/list-view', ['products' => $new_products]) ?>
    </div>
    <div class="single-block day_nomina">
        <h2 class="top-bar">Đề cử trong ngày</h2>
        <div class="todays-box clearfix">
            <?= $hot_product->a('block', "<span class=\"block\">{$hot_product->banner(['class' => 'todays-screenshot', 'width' => 307, 'height' => 152])}</span><h1><span class=\"app-name\"><strong>{$hot_product->name}</strong></span></h1>") ?>
            <div class="fr judge"> <span class="action fl magr5"><a class="favorite" href="#"><span>&nbsp;</span></a></span> <span class="az-rating fl"><span class="rating8"><strong><?= $hot_product->review_score ?></strong></span></span> </div>
            <p class="rating clearfix"><span class="stars fl"><span style="width: 66px;">(<?= $hot_product->review_score ?>)</span></span> <span class="fl">(<?= $hot_product->view_count ?>)</span></p>
            <?= $hot_product->a('clbue', "<div class=\"quote\"><p>{$hot_product->description}</p></div>") ?>
        </div>
    </div>
    <div class="single-block top_dowload mag0">
        <h2 class="top-bar">Top tải về trong ngày</h2>
        <?= $this->render('//product/list-view', ['products' => $top_download_products]) ?>
    </div>
</div>
<div class="application clearfix">
    <div class="feed-slim">
        <?= $this->render('//article/right-box') ?>
<!--        <div class="ads magb10"><?= $this->render('//modules/adsense', ['type' => 'square']) ?></div>
        <div class="box">
            <h2 class="top-bar">Tin tức mới nhất</h2>
            <div class="single-block feed_wrap mag0">
                <ul class="apps-list">
                    <?php
                    foreach ($new_articles as $item) {
                        ?>
                        <li class="clearfix">
                            <p class="head">Đăng bởi :<a href="#" class="clbue"><?= $item->auth() ?> </a> <span class="cl999 fr">14:20</span></p>
                            <div class="installed magT10">
                                <?= $item->a('app-ico', $item->img('app-ico')) ?>
                                <div class="app-info">
                                    <span class="app-name">
                                        <?= $item->a('goTo', "<span class=\"name\">{$item->name}</span>") ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>-->
    </div>
    <?php
    foreach ($product_categories as $cate) {
        ?>
        <div class="double-block">
            <h2 class="top-bar"><?= $cate->a('cl1a') ?></h2>
            <div class="single-block">
                <?= $this->render('//product/list-view', ['products' => $cate->getProducts(['limit' => 4])]) ?>
            </div>
            <p class="magr10 txt-right"><?= $cate->a('clbue', 'Xem thêm »') ?></p>
        </div>
        <?php
    }
    ?>