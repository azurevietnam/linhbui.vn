<section class="row list-view">
    <?php
    if ($title != '') {
    ?>
    <h2 class="title">
        <i></i>
        <span><?= $title ?></span>
        <i></i>
    </h2>
    <?php
    }
    ?>
    <div class="list">
        <?php
        foreach ($items as $item) {
        ?>
        <a class="thumb" href="<?= $item->getLink() ?>" title="<?= $item->name ?>">
            <div class="img-wrap">
                <img src="<?= $item->getImage(\common\models\MyActiveRecord::IMAGE_MEDIUM) ?>" title="<?= $item->name ?>" alt="<?= $item->name ?>">
            </div>
            <div class="desc">
                <h3 class="name"><?= $item->name ?></h3>
            </div>
            <div class="clearfix"></div>
        </a>
        <?php
        }
        ?>
    </div>
</section>