<?php

use frontend\models\SiteParam;

?>
<style>
.prop-name {
    color: #000;
    font-size: 1.05em;
}
.hidden {
    display: none;
}
.hidden.active {
    display: block;
}
.tab-name {
    font-weight: normal !important;
    white-space: nowrap;
    padding-right: 1em;
}
.tab-name:not(:last-child) {
    margin-right: 1em;
    border-right: 1px solid #eee;
}
.tab-name.active {
    color: #fc0 !important;
}

</style>
<script>
function showElem(id, e) {
    var hiddens = document.getElementsByClassName("hidden");
    for (var i = 0; i < hiddens.length; i++) {
        hiddens[i].classList.remove("active");
    }
    var tabNames = document.getElementsByClassName("tab-name");
    for (var i = 0; i < tabNames.length; i++) {
        tabNames[i].classList.remove("active");
    }
    document.getElementById(id).classList.add("active");
    e.classList.add("active");
}
</script>
<div class="wrap">
    <div class="col-6">
        <?= $this->render('//modules/slideshow-multi', [
            'data' => $slideshow,
            'options' => [
                'box_width_preview' => $this->context->is_mobile ? '100%' : '100%',
                'img_max_height_preview' => '500px',
                'img_wph_ratio_preview' => 1,
                'img_margin_preview' => '0',
                'img_number_preview' => $this->context->is_mobile ? 1 : 1,

                'box_width' => $this->context->is_mobile ? '100%' : '100%',
                'img_max_width' => '100%',
                'img_max_height' => '100vh',
                'img_wph_ratio' => 0.5,

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
                <p><?= $model->description ?></p>
                <br>
                <p><span class="prop-name">Màu sắc:</span> <?= $model->color ?></p>
                <br>
                <p><span class="prop-name">Chất liệu:</span> <?= $model->malterial ?></p>
                <br>
                <p><span class="prop-name">Kiểu dáng:</span> <?= $model->style ?></p>
                <br>
                <p><span class="prop-name">Giá bán/ thuê:</span> <?= $model->price == 0 || $model->price == "" ? 'Vui lòng liên hệ ' . SiteParam::findOneByName(SiteParam::PARAM_PHONE_NUMBER)->value : $model->price ?></p>
            </article>
        </div>
    </div>
    <div class="col-12">
        <div class="magt10">
            <p class="paragraph magb10">
                <a onclick="showElem('details', this)" href="javascript:;" class="tab-name active title">Thông tin sản phẩm</a>
                <a onclick="showElem('comment', this)" href="javascript:;" class="tab-name title">Đánh giá</a>
                <a onclick="showElem('contact', this)" href="javascript:;" class="tab-name title">Thông tin liên hệ</a>
            </p>
            <article id="details" class="active hidden paragraph">
                <?= $model->details ?>
            </article>
            <article id="comment" class="hidden paragraph">
                <?= $this->render('//modules/comment', [
                    'id' => $model->id,
                    'counter_url' => yii\helpers\Url::to(['product/counter'], true),
                    'options' => ['class' => 'box-comment'],
                ]) ?>
            </article>
            <article id="contact" class="hidden paragraph">
                <?= frontend\models\Article::findOneByType(frontend\models\Article::TYPE_CONTACT_US)->content ?>
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