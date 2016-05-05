<div class="col-l">
    <div class="content-detail">
        <h2 class="title-detail"><strong><?= $model->name ?></strong></h2>
        <p class="clearfix info-post">
            <time class="fl"><em class="ic-lock"></em><?= $model->date() ?></time>
            <span class="fl comment"><em class="ic-comment"></em><?= $model->comment_count ?></span>
            <span class="fl views"><em class="ic-views"></em><?= $model->view_count ?></span></p>
        <div class="text-detail paragraph-2016-05">
            <?= $model->content ?>
        </div>
        <div class="box-social"><strong>Chia sẻ:</strong></div>
        <?= $this->render('//modules/like-share', ['options' => ['class' => 'box-social']]) ?>


        <div class="news-rela">
            <h2 class="title"><strong>Bài viết liên quan</strong></h2>
            <ul class="list-unstyle clearfix">
                <?php
                foreach ($related_items as $item) {
                ?>
                <li class="clearfix">
                    <?= $item->a(['class' => 'img-bn'], $item->img()) ?>
                    <h3><?= $item->a([], "<strong>$item->name</strong>") ?></h3>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <?= $this->render('//modules/comment', [
            'id' => $model->id,
            'counter_url' => yii\helpers\Url::to(['article/counter'], true),
            'options' => ['class' => 'box-comment'],
        ]) ?>
    </div>

</div>