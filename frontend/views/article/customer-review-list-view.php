<section class="row list-view">
    <h1 class="title">
        <i></i>
        <span><?= $title ?></span>
        <i></i>
    </h1>
    <div class="list">
        <?php
        foreach ($items as $item) {
        ?>
        <div class="row detail">
            <h3 class="name"><a href="<?= $item->getLink() ?>" title="<?= $item->name ?>"><?= $item->name ?></a></h3>
            <a class="img-wrap" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
                <img src="<?= $item->getImage(frontend\models\Article::IMAGE_TINY) ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </a>
            <p class="desc"><?= $item->description ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</section>