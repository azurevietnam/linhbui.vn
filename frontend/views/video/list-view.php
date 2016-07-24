<style>
/*.list-view .detail .img-wrap {
    width: 43%;
    float: left;
    padding-right: 3%;
    line-height: 0;
    z-index: 1;
    margin-top: 0.3em;
}*/
.list-view .detail .icon-play {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    display: inline-block;
    opacity: 1;
    pointer-events: none;
}
.list-view .detail .img-wrap:hover .icon-play {
    opacity: 0.6;
}
@media screen and (max-width: 740px) {
    .list-view .detail .icon-play {
        transform: scale(0.6, 0.6);
        -webkit-transform: scale(0.6, 0.6);
    }
}
</style>
<section class="row list-view">
    <?php
    if (isset($title) && $title != '') {
    ?>
    <h2 class="title">
        <hr>
        <strong>
            <i></i>
            <span><?= $title ?></span>
            <i></i>
        </strong>
    </h2>
    <?php
    }
    ?>
    <div class="list">
        <?php
        foreach ($items as $item) {
        ?>
        <div class="row detail">
            <h3 class="name"><?= $item->a() ?></h3>
            <?= $item->a(['class' => 'img-wrap'], $item->img($this->context->is_mobile ? frontend\models\Article::IMAGE_TINY : \frontend\models\Article::IMAGE_SMALL) . '<span class="icon2 icon-play"></span>') ?>
            <p class="desc"><?= $item->desc() ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</section>