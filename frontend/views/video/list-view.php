<style>
.list-view .detail .img-wrap {
    width: 43%;
    float: left;
    padding-right: 3%;
    line-height: 0;
    z-index: 1;
    margin-top: 0.3em;
}
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
    <h2 class="title">
        <hr>
        <strong>
            <i></i>
            <span><?= $title ?></span>
            <i></i>
        </strong>
    </h2>
    <div class="list">
        <?php
        foreach ($items as $item) {
        ?>
        <div class="row detail">
            <h3 class="name"><a href="<?= $item->getLink() ?>" title="<?= $item->name ?>"><?= $item->name ?></a></h3>
            <a class="img-wrap" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
                <img src="<?= $item->getImage(frontend\models\Article::IMAGE_SMALL) ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
                <span class="icon2 icon-play"></span>
            </a>
            <p class="desc"><?= $item->desc() ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</section>