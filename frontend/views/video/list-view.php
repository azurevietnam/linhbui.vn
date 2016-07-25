<style>
/*.list-view .detail .img-wrap {
    width: 43%;
    float: left;
    padding-right: 3%;
    line-height: 0;
    z-index: 1;
    margin-top: 0.3em;
}*/
.list-view .detail .info {
    border: none;
    margin-top: 0;
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
    transform: scale(0.8, 0.8);
    -webkit-transform: scale(0.8, 0.8);
    opacity: 0.8;
}
.list-view .detail .img-wrap:hover .icon-play {
    opacity: 0.5;
}
@media screen and (max-width: 740px) {
    .list-view .detail .icon-play {
        transform: scale(0.6, 0.6);
        -webkit-transform: scale(0.6, 0.6);
    }
    .list-view .detail .info > * {
        float: left;
        margin-right: 1em;
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
            <div class="info">
                <div><span class="auth"><?= $item->auth() ?> |</span> <span class="date"><?= $item->date('d/m/Y') ?></span></div>
                <div class="magb5">
                    <span><i class="icon2 icon-eye"></i> <?= $item->view_count ?></span>
                    &nbsp; &nbsp;
                    <span><i class="icon2 icon-chat"></i> <?= $item->comment_count ?></span>
                </div>
                <?= $this->render('//modules/like-share', ['link' => $item->getLink()]) ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>