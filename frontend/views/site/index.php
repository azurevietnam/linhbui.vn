<div class="ads txt-center magT10">
    <div class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </div>
</div>
<div class="application magT5 bottom25 clearfix">
<?php
if (!$this->context->is_mobile || $this->context->is_tablet) {
?>
    <div class="single-block new_update">
        <h2 class="top-bar">Mới cập nhật</h2>
        <?= $this->render('//product/list-view', ['products' => $new_products]) ?>
    </div>
    <div class="single-block day_nomina">
        <h2 class="top-bar">Đề cử trong ngày</h2>
        <div class="todays-box clearfix">
            <?= $hot_product->a('block', "<span class=\"block\">{$hot_product->banner(['class' => 'todays-screenshot', 'width' => 307, 'height' => 152], frontend\models\Product::$banner_resizes['medium'])}</span><div><span class=\"app-name\"><strong>{$hot_product->name}</strong></span></div>") ?>
            <p class="rating clearfix"><span class="stars fl"><span style="width:<?= $hot_product->star() ?>px">(<?= $hot_product->review_score ?>)</span></span> <span class="fl">(<?= $hot_product->review_score ?>)</span></p>
            <?= $hot_product->a('clbue', "<div class=\"quote\"><p>{$hot_product->description}</p></div>") ?>
        </div>
    </div>
<?php
} else {
?>
    <div class="single-block day_nomina">
        <h2 class="top-bar">Đề cử trong ngày</h2>
        <div class="todays-box clearfix">
            <?= $hot_product->a('block', "<span class=\"block\">{$hot_product->banner(['class' => 'todays-screenshot', 'width' => 307, 'height' => 152], frontend\models\Product::$banner_resizes['medium'])}</span><div><span class=\"app-name\"><strong>{$hot_product->name}</strong></span></div>") ?>
            <p class="rating clearfix"><span class="stars fl"><span style="width:<?= $hot_product->star() ?>px">(<?= $hot_product->review_score ?>)</span></span> <span class="fl">(<?= $hot_product->review_score ?>)</span></p>
            <?= $hot_product->a('clbue', "<div class=\"quote\"><p>{$hot_product->description}</p></div>") ?>
        </div>
    </div>
    <div class="single-block new_update">
        <h2 class="top-bar">Mới cập nhật</h2>
        <?= $this->render('//product/list-view', ['products' => $new_products]) ?>
    </div>
<?php
}
?>
    <div class="single-block top_dowload mag0">
        <h2 class="top-bar">Top tải về trong ngày</h2>
        <?= $this->render('//product/list-view', ['products' => $top_download_products]) ?>
    </div>
</div>
<div class="application clearfix">
    <div class="feed-slim">
        <?= $this->render('//article/right-box') ?>
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
</div>