<div class="ads txt-center magT10">
    <div class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </div>
    <?= $this->render('//modules/breadcrumbs') ?>
</div>
<section class="columns-container">
    <div class="container detail-content">
        <div class="row">
            <div class="col-md-8 content-left">
                <div class="block-product">
                    <h1 class="panel-title title-txt-l"><strong><em><?= $cate->name ?></em></strong></h1>
                    <div class="product-list">
                        <?php
                        foreach ($articles as $item) {
                            ?>
                            <div class="item clearfix">
                                <?= $item->a('product-img', $item->img()) ?>
                                <div class="product-meta">
                                    <h2 class="name-product"><?= $item->ast() ?></h2>
                                    <p class="info">
                                        <span class="date"><i class="fa fa-calendar"></i> <?= $item->date() ?></span>
                                        <span class="comment"><i class="fa fa-comments"></i> <?= $item->comment_count ?></span>
                                        <span class="views"><i class="fa fa-eye"></i> <?= $item->view_count ?></span>
                                    </p>
                                    <p class="txt-desc"><?= $item->summary() ?></p>
                                    <p class="view-more"><?= $item->a('', 'Chi tiết') ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <?= $this->render('//layouts/box_articles') ?>
                <div class="box-adv">
                    <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
                </div>
            </div>
        </div>
    </div>

</section>
