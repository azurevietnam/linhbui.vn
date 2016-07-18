<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
            <div class="banner">
                <?= $category->banner != '' ? $category->img(['src' => $category->getBanner(), 'style' => 'width:100%']) : '' ?>
            </div>
            <br class="clearfix">
            <?php
                echo $this->render('//product/list-view', [
                    'title' => $category->name,
                    'items' => $items,
                ]);
            ?>
            <?= $this->render("//modules/pagination", ['pagination' => $pagination]) ?>
        </div>
    </div>
</div>
<style>
@media screen and (min-width: 1000px) {
    .list-view .thumb {
        width: calc(98.5% / 3 - 1em);
        margin: 0.5em;
    }
}
.banner {
    line-height: 0;
}
</style>