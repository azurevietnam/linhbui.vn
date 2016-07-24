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
            <?= $item->a(['class' => 'img-wrap'], $item->img($this->context->is_mobile ? frontend\models\Article::IMAGE_TINY : \frontend\models\Article::IMAGE_SMALL )) ?>
            <p class="desc"><?= $item->desc() ?></p>
            <div class="info">
                <span class="auth"><?= $item->auth() ?></span>,
                <span class="date"><?= $item->date('d/m/Y') ?></span>
                <?= $item->a(['class' => 'link'], '&Gt;') ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>