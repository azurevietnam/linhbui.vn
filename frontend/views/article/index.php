<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
            <article class="paragraph">
                <h2 class="title"><?= $model->name ?></h2>
                <?= $model->content ?>
            </article>
        </div>
    </div>
</div>