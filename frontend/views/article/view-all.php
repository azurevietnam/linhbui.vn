<div class="ads txt-center magT10">
    <p class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </p>
    <?= $this->render('//modules/breadcrumbs') ?>
</div>
<div class="application clearfix">
    <div class="title-page">Tin tức</div>
    <div class="new_left magb10">
        <?php
        foreach ($articles as $item) {
        ?>
        <div class="pad_group clearfix magb10">
            <h2 class=" relative"><?= $item->ast() ?></h2>
            <p class="clearfix info-post">
                <time class="fl"><em class="ic-lock"></em><?= $item->date() ?></time>
                <span class="fl num-coment"><em class="comment"></em><?= $item->comment_count ?> bình luận</span>
                <span class="fl views"><em class="ic-folder"></em>Tin tức</span></p>
            <p align="center" class="img-left"><?= $item->img('img_detail', \frontend\models\Article::$image_resizes[$this->context->is_mobile ? 'small' : 'medium']) ?></p>
            <div class="detail_new mag-l">
                <p><?= $item->summary() ?> <?= $item->a('clbue', '[...]') ?></p>
            </div>
        </div>
        <?php
        }
        ?>
        <?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>
    </div>
    <?= $this->render('//article/right-box') ?>
</div>
