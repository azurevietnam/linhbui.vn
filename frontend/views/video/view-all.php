<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
<?php
    echo $this->render('list-view', [
        'title' => 'Video clips',
        'items' => $items,
    ]);
?>
    </div>
</div>