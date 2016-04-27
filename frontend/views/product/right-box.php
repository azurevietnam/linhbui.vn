<?php
$game = $this->context->game;
$app = $this->context->app;
if ($game->isCurrent()) {
    $title = "$game->label khác";
} else if ($app->isCurrent()) {
    $title = "$app->label khác";
} else {
    $title = 'Sản phẩm khác';
}
?>
<div class="left_bar">
    <div class="single-block related_apps">
        <h3 class="top-bar"><?= $title ?></h3>
        <ul class="apps-list">
            <?php
            foreach ($products as $item) {
            ?>
            <li class="clearfix">
                <?= $item->a('app-ico', $item->img('app-ico', frontend\models\Product::$image_resizes['tiny'])) ?>
                <div class="app-info">
                    <h4>
                        <span class="app-name">
                            <?= $item->a('goTo', "<span class=\"name s12\">{$item->name}</span>") ?>
                        </span>
                    </h4>
                    <p class="rating">
                        <span class="stars fl"><span style="width:<?= $item->star() ?>px">(<?= $item->review_score ?>)</span></span>(<?= $item->review_score ?>)
                    </p>
                    <p> <span class="free"><?= $item->price() ?></span></p>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>