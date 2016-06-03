<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
        <?php
            echo $this->render('list-view', [
                'title' => 'Bộ sưu tập',
                'items' => $items,
            ]);
        ?>
        <?= $this->render("//modules/pagination", ['pagination' => $pagination]) ?>
        </div>
    </div>
</div>