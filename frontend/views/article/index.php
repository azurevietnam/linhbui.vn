<div class="wrap">
    <div class="col-3">
        <?= $this->render('//modules/breadcrumbs') ?>
    </div>
    <div class="col-9">
        <article class="paragraph">
            <h2 class="title"><?= $model->name ?></h2>
            <?= $model->content ?>
        </article>
    </div>
</div>