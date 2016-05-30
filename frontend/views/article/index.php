<div class="wrap">
    <div class="col-3">
        <?= $this->render('//modules/breadcrumbs') ?>
    </div>
    <div class="col-9">
        <h2><?= $model->name ?></h2>
        <article class="paragraph">
        <?= $model->content ?>
        </article>
    </div>
</div>