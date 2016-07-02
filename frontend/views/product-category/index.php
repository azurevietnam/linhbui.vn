<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
        <?= $category->banner != '' ? $category->img(['src' => $category->getBanner(), 'style' => 'width:100%']) : '' ?>
        <?php
            echo $this->render('//product/list-view', [
                'title' => $category->name,
                'items' => $items,
            ]);
        ?>
        <?= $this->render("//modules/pagination", ['pagination' => $pagination]) ?>
        </div>
    </div>
</div>