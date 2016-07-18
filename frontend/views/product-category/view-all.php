<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
            <div class="banner">
                <?= $this->render('//modules/slideshow', [
                    'data' => $slideshow,
                    'options' => [
                        'time_slide' => 800,
                        'time_out' => 4000,
                        'img_max_width' => '1010px'
                    ]
                ]);
                ?>
            </div>
            <br class="clearfix">
            <?php
                echo $this->render('list-view', [
                    'title' => 'Bộ sưu tập',
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