<div class="breadcrumbs container">
<div class="wrap">
<ul>
<?php
    foreach ($this->context->breadcrumbs as $item) {
        ?><li><a href="<?= $item['url'] ?>" title="<?= $item['label'] ?>"><?= $item['label'] ?></a></li><?php
    }
?>
</ul>
<div class="clearfix"></div>
</div>
</div>