<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <article class="paragraph">
            <h2 class="title"><?= $model->name ?></h2>
            <?= $model->details ?>
        </article>
    </div>
</div>