<?php

use frontend\models\Article;
use frontend\models\SiteParam;
use yii\helpers\Url;

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
        <?= $this->render('//modules/previewable-slideshow', [
            'data' => $slideshow,
            'preview_options' => [
                'items_per_page' => 5,
            ]
        ]);
        ?>
    </div>
    <div class="col-6">
        <div class="dsk-padl10">
            <article class="paragraph">
                <h2 class="title"><?= $model->name ?></h2>
                <p class="desc"><?= $model->description ?></p>
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
                <a onclick="showElem('details', this)" href="javascript:;" class="<?= $model->details != '' ? 'active ' : '' ?>tab-name title">Thông tin sản phẩm</a>
                <a onclick="showElem('comment', this)" href="javascript:;" class="<?= $model->details == '' ? 'active ' : '' ?>tab-name title">Đánh giá (<?= $model->comment_count ?>)</a>
                <a onclick="showElem('contact', this)" href="javascript:;" class="tab-name title">Thông tin liên hệ</a>
            </p>
            <article id="details" class="<?= $model->details != '' ? 'active ' : '' ?>hidden paragraph">
                <?= $model->details ?>
            </article>
            <article id="comment" class="<?= $model->details == '' ? 'active ' : '' ?>hidden col-7">
                <div class="fluid">
                <?php echo $this->render('//modules/comment', [
                    'id' => $model->id,
                    'counter_url' => Url::to(['product/counter'], true),
                    'options' => ['class' => 'box-comment'],
                ]) ?>
                </div>
            </article>
            <article id="contact" class="hidden paragraph col-7">
                <?= Article::findOneByType(Article::TYPE_CONTACT_US)->content ?>
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