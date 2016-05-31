<?php
    $slideshow = [];
    foreach ($model->getGalleryImages()->all() as $item) {
        $slideshow[] = [
            'caption' => $item->caption,
            'link' => 'javascript:void(0)',
            'img_src' => $item->getImage(),
            'img_src_preview' => $item->getImage(\frontend\models\Gallery::IMAGE_SMALL),
            'img_alt' => $item->caption,
        ];
    }
?>
<div class="wrap">
    <div class="col-3">
        <?= $this->render('//modules/breadcrumbs') ?>
    </div>
    <div class="col-9">
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
            <h2><?= $model->name ?></h2>
            <?= $model->description ?>
        </div>
        <?= $this->render('//modules/comment') ?>
    </div>
</div>