<?= $this->render('//modules/breadcrumbs') ?>
<section class="columns-container">
    <div class="container detail-content">
        <div class="row">
            <div class="col-md-8 content-left">
                <?= $model->content ?>
            </div>
            <div class="col-md-4 sidebar">
                <div class="box-adv">
                    <?= $this->render('//modules/adsense') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$this->registerJs('
$(".content-left table, .content-left img").each(function(){
    var obj = $(this);
    var obj_parent = obj.parents(".content-left");
    if (obj.width() > obj_parent.width()) {
        obj.width(obj_parent.width() + "px").height("auto");
    }
});
');
