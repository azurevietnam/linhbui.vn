<ul class="apps-list">
    <?php
    foreach ($products as $item) {
    ?>
    <li class="clearfix">
        <?= $item->a('app-ico', $item->img('app-ico', frontend\models\Product::$image_resizes['tiny'])) ?>
        <div class="app-info">
            <h2>
                <span class="app-name">
                    <?= $item->a('goTo', "<span class=\"name\">{$item->name}</span>") ?>
                </span>
            </h2>
            <p class="rating"><span class="stars fl"><span style="width:<?= $item->star() ?>px">(<?= $item->review_score ?>)</span></span>(<?= $item->review_score ?>)</p>
            <p> <span class="free"><?= $item->price() ?></span></p>
        </div>
    </li>
    <?php
    }
    ?>
</ul>