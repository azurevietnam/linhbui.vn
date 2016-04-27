<div class="ads txt-center magT10">
    <div class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </div>
    <?= $this->render('//modules/breadcrumbs') ?>
</div>
<div class="application clearfix">
<div class="new_left magb10">
    <div class="pad_group magb10">
        <div class="magb10 title-post"><strong><?= $model->name ?></strong></div>
        <h2 class="lead magb10"><strong><?= $model->description ?></strong></h2>
        <div class="box_like clearfix">
            <p class="clearfix info-post info-post-pagedetail fl">
                <span class="fl post-by"><em class=" ic-postby"></em>Đăng bởi: <a class="clbue s13" href="javascript:void(0)"><?= $model->auth() ?></a></span>
                <time class="fl"><em class="ic-lock"></em><?= $model->date() ?></time>
                <span class="fl num-coment"><em class="comment"></em><?= $model->comment_count ?> bình luận</span>
            </p>
            <?= $this->render('//modules/like_share', [
                'options' => ['class' => 'addthis_tool fr']
            ]) ?>
        </div>
        <p align="center" class="magb10">
            <?= $model->img('img_detail') ?>
        </p>
        <div class="detail_new nomax paragraph-2016-04">
          <?= $model->content ?>
        </div>
        <div class="box_like clearfix">
            <div class="addthis_tool">
                <?= $this->render('//modules/like_share') ?>
            </div>
        </div>
        <div class="txt-center magT10">
            <?= $this->render('//modules/adsense', ['type' => 'square']) ?>
        </div>
        <?php
        if ($references !== []) {
        ?>
        <div class="bottom_new clearfix">
            <p class="magb10"><strong class="s14">CÓ THỂ BẠN QUAN TÂM </strong></p>
            <ul class="list magb10 clearfix">
                <?php
                foreach ($references as $item) {
                ?>
                <li class="clearfix"><?= $item->a() ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <?php
        }
        ?>
        <?= $this->render('//modules/comment', [
            'id' => $model->id,
            'counter_url' => yii\helpers\Url::to(['article/counter'], true),
            'options' => ['class' => 'box box-comment-face']
        ]) ?>
      </div>
  </div>
    <?= $this->render('//article/right-box') ?>
</div>