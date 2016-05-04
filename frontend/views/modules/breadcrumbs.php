<div class="breadcrumb">
<?php
$num = count($this->context->breadcrumbs);
foreach ($this->context->breadcrumbs as $item) {
    $num--;
    ?>
    <a href="<?= $item['url'] ?>" <?= $num == 0 ? 'class=last' : '' ?>>
        <?= $item['label'] ?>
    </a>
    <?= $num > 0 ? '»' : '' ?>
    <?php
}
?>
</div>