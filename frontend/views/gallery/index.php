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
            <?= $this->render('//modules/slideshow-multi', [
                'data' => $slideshow,
                'options' => [
                    'box_width_preview' => $this->context->is_mobile ? '75%' : '100%',
                    'img_max_height_preview' => '150px',
                    'img_wph_ratio_preview' => 1,
                    'img_margin_preview' => '2%',
                    'img_number_preview' => $this->context->is_mobile ? 1 : 3,

                    'box_width' => $this->context->is_mobile ? '100%' : '60%',
                    'img_max_width' => '',
                    'img_max_height' => '100vh',
                    'img_wph_ratio' => 2,

                    'time_slide' => 300,
                    'time_out' => 3000,
                    'auto_run' => true,
                    'pause_on_hover' => true
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