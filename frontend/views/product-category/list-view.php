<section class="row list-view">
    <h2 class="title">
        <i></i>
        <span><?= $title ?></span>
        <i></i>
    </h2>
    <div class="list">
        <?php
        foreach ($items as $item) {
        ?>
        <a class="thumb" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="img-wrap">
                <img src="<?= $item->getImage('--200x200') ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <div class="desc">
                <h3 class="name"><?= $item->name ?></h3>
                <?= $item->description ?>
            </div>
            <div class="clr"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>