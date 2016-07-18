<div class="wrap">
    <div class="col-3">
        <?= $this->render('//layouts/left') ?>
    </div>
    <div class="col-9">
        <div class="dsk-padl10">
            <div class="col-12 paragraph">
                <h2 class="title"><?= $model->name ?></h2>
                <div class="info">
                    <span><i class="icon2 icon-eye"></i> Lượt xem: <span style="color:#dbbb6c"><?= $model->view_count ?></span></span>
                    &nbsp; &nbsp;
                    <span><i class="icon2 icon-chat"></i> Lượt bình luận: <span style="color:#dbbb6c"><?= $model->comment_count ?></span></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <?= $this->render('//modules/previewable-slideshow', [
                'data' => $slideshow,
                'preview_options' => [
                    'items_per_page' => 8,
                ]
            ]);
            ?>
            <div class="paragraph col-12">
                <?= $model->description ?>
            </div>
            <?= $this->render('//modules/comment') ?>
        </div>
    </div>
</div>