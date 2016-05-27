<div class="col-l">
    <div class="content-detail">
        <h2 class="title-detail"><strong><?= $model->name ?></strong></h2>
        <p class="clearfix info-post">
            <time class="fl"><em class="ic-lock"></em><?= $model->date() ?></time>
            <span class="fl comment"><em class="ic-comment"></em><?= $model->comment_count ?></span>
            <span class="fl views"><em class="ic-views"></em><?= $model->view_count ?></span>
        </p>
        <p class="text-detail paragraph-2016-05" style="font-weight:bold;color:#666">
            <?= $model->description ?>
        </p>
        <div class="text-detail paragraph-2016-05">
            <?php
            $new_content = $model->content;
            $start_pos = 0;
            $num = 0;
            do {
                $pos = strpos($new_content, '</p>', $start_pos);
                if ($pos !== false) {
                    $num++;
                    $start_pos = $pos + 100;
                    $new_content = substr_replace($new_content, "</p>{$this->render('//modules/adsense')}", $pos, strlen('</p>'));
                }
            } while ($pos !== false && $num < 3);
            ?>
            <?= $new_content ?>
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
                    <?= $item->a(['class' => 'img-bn'], $item->img([], \frontend\models\Article::IMAGE_SMALL)) ?>
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