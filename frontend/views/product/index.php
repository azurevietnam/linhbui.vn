<div class="wrap">
    <div class="col-6">
        <?= $this->render('//modules/slideshow-multi', [
            'data' => $slideshow,
            'options' => [
                'box_width_preview' => $this->context->is_mobile ? '100%' : '100%',
                'img_max_height_preview' => '450px',
                'img_wph_ratio_preview' => 1,
                'img_margin_preview' => isset($slideshow[1]) ? '2%' : '0%',
                'img_number_preview' => $this->context->is_mobile ? 1 : 3,

                'box_width' => $this->context->is_mobile ? '100%' : '100%',
                'img_max_width' => '',
                'img_max_height' => '100vh',
                'img_wph_ratio' => 3,

                'time_slide' => 300,
                'time_out' => 3000,
                'auto_run' => true,
                'pause_on_hover' => true
            ]
        ]);
        ?>
    </div>
    <div class="col-6">
        <div class="dsk-padl10">
            <article class="paragraph">
                <h2 class="title"><?= $model->name ?></h2>
                <?= $model->description ?>
            </article>
        </div>
    </div>
    <div class="col-12">
        <div class="magt10">
            <article class="paragraph">
                <h2 class="title">Thông tin sản phẩm</h2>
                <?= $model->details ?>
            </article>
        </div>
    </div>
    <?php
    if (isset($related_items[0])) {
    ?>
    <div class="col-12">
        <div class="magt10">
        <?php
            echo $this->render('list-view', [
                'title' => 'Xem thêm',
                'items' => $related_items,
            ]);
        ?>
        </div>
    </div>
    <?php
    }
    ?>
</div>