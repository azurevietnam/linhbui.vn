<?php

use frontend\models\Article;

?>
<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 600,
        'time_out' => 3000,
        'img_max_width' => '1010px'
    ]
]);
?>
<div class="wrap">
    <section class="row list-view">
        <h2 class="title">
            <i></i>
            <span>Chúng tôi là ai?</span>
            <i></i>
        </h2>
        <div class="introtext paragraph col-12">
            <?= Article::findOneByType(Article::TYPE_ABOUT_US)->description ?>
        </div>
    </section>
    <?= $this->render('//product-category/list-view', [
        'title' => 'Bộ sưu tập mới',
        'items' => $product_categories
    ]) ?>
    <?= $this->render('//product/list-view', [
        'title' => 'Sản phẩm nổi bật',
        'items' => $products
    ]) ?>
</div>