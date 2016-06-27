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
            <div class="col-12">
                <div class="video-container">
                    <iframe frameborder="0" allowfullscreen
                        src="<?= $model->source ?>?autoplay=1">
                    </iframe>
                </div>
            </div>
            <div class="col-12 paragraph">
                <?= $model->description ?>
            </div>
            <?= $this->render('//modules/comment') ?>
        </div>
    </div>
</div>
<style>
.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}
.video-container iframe,
.video-container object,
.video-container embed {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}
</style>