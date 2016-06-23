<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
            <article class="paragraph">
                <div class="col-12 paragraph">
                    <h2 class="title"><?= $model->name ?></h2>
                    <div style="margin-top:-.5em;color:#888" class="paragraph">
                        <span><i class="icons2 icon-eye"></i> Lượt xem: <span style="color:#dbbb6c"><?= $model->view_count ?></span></span>
                        &nbsp; &nbsp;
                        <span><i class="icons2 icon-chat"></i> Lượt bình luận: <span style="color:#dbbb6c"><?= $model->comment_count ?></span></span>
                    </div>
                </div>
                <div class="col-12">
                    <?= $model->content ?>
                </div>
            </article>
        </div>
    </div>
</div>