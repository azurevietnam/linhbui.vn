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
                <img src="<?= $item->getImage(frontend\models\Article::IMAGE_TINY) ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </a>
            <p class="desc"><?= $item->desc() ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<style>
    .list-view .detail .name {
        text-transform: uppercase;
    }
</style>