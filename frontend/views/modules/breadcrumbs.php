<ul class="breadcrumbs">
<?php
    foreach ($this->context->breadcrumbs as $item) {
        ?><li><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a></li><?php
    }
?>
</ul>