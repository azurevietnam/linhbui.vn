<div class="padth txt-left">
    <?php
    $num = count($this->context->breadcrumbs);
    foreach ($this->context->breadcrumbs as $item) {
        $num--;
        ?>
        <div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope class="list_path <?= $num == 0 ? 'last' : '' ?>">
            <a rel="nofollow" href="<?= $item['url'] ?>" itemprop="url">
                <span itemprop="title"><?= $item['label'] ?></span>
            </a>
        </div>
        <?php
    }
    ?>
</div>