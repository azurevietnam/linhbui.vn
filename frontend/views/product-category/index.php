<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
        <?php
            echo $this->render('//product/list-view', [
                'title' => $category->name,
                'items' => $items,
            ]);
        ?>
        </div>
    </div>
</div>