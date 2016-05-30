<?= $this->render('//modules/slideshow', [
    'data' => $slideshow,
    'options' => [
        'time_slide' => 600,
        'time_out' => 3000
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
            Xu hướng váy phụ dâu không đồng nhất mang đến nét độc đáo và mới lạ cho lễ cưới. Tùy theo sở thích và vóc dáng của các nàng phụ dâu, váy có thể có nhiều kiểu dáng và màu sắc khác nhau nhưng vẫn có sự đồng điệu nhờ vào chất liệu chiffon suôn rủ, mềm mại.  Tông màu xanh pastel dù khác nhau nhưng vẫn vô cùng hài hòa và ngọt ngào.
            Xu hướng váy phụ dâu không đồng nhất mang đến nét độc đáo và mới lạ cho lễ cưới. Tùy theo sở thích và vóc dáng của các nàng phụ dâu, váy có thể có nhiều kiểu dáng và màu sắc khác nhau nhưng vẫn có sự đồng điệu nhờ vào chất liệu chiffon suôn rủ, mềm mại.  Tông màu xanh pastel dù khác nhau nhưng vẫn vô cùng hài hòa và ngọt ngào.
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