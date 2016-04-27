<!--
<?= \frontend\models\Menu::$current_key ?>
-->
<div class="ads txt-center magT10">
    <div class="magb5">
        <?= $this->render('//modules/adsense') ?>
    </div>
    <?= $this->render('//modules/breadcrumbs') ?>
</div>
<div class="application clearfix">
    <div class="category hide">
        <div class="top-bar"><?= $side_title ?></div>
        <ul class="clearfix">
            <li>
                <ul class="list">
                    <?php
                    foreach ($side_list as $item) {
                    ?>
                    <li class="clearfix"><?= $item->a(['class' => $item->isCurrent() ? 'active' : '']) ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
    <div class="wrapper-right">
        <div class="top-bar">
            <h2 class="fl title"><strong><?= $cate->h1 ?></strong></h2>
            <ul class="lisstyle fr">
                <li class="clearfix"><a href="<?= yii\helpers\Url::current(['sort' => 'new'], true) ?>" title="Mới" <?= $sort == 'new' ? 'class=active' : '' ?>>Mới</a></li>
                <li class="last clearfix"><a href="<?= yii\helpers\Url::current(['sort' => 'hot'], true) ?>" title="Hot" <?= $sort == 'hot' ? 'class=active' : '' ?>>Hot</a></li>
            </ul>
        </div>
        <div class="search-results clearfix">
            <ul class="search">
                <?php
                foreach ($products as $item) {
                ?>
                <li class="app clearfix">
                    <div class="item-border clearfix">
                        <div class="single-block">
                            <ul class="apps-list">
                                <li class="clearfix">
                                    <?= $item->a('app-ico', $item->img('app-ico')) ?>
                                    <div class="app-info">
                                        <h2>
                                            <span class="app-name">
                                                <?= $item->a('goTo', "<span class=\"name\">{$item->name}</span>") ?>
                                            </span>
                                        </h2>
                                        <p class="rating">
                                            <span class="free fl"><?= $item->price() ?></span>
                                            <span class="stars fl"><span style="width:<?= $item->star() ?>px">(<?= $item->review_score ?>)</span></span>
                                            (<?= $item->review_score ?>)
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dowload fl">
                            <?php
                            $download = $item->getDownloadLink($this->context->os_id);
                            ?>
                            <button type="button" <?= $download !== null ? "onclick=\"updateProductDownloadCount({$item->id}, 1 + {$item->download_count}, '$download')\"" : '' ?> class="btn_blues magT5"><span>Download</span></button>
                            <p class="cl333">(<?= $item->view_count ?> lượt xem)</p>
                        </div>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
            <?= $this->render('//modules/pagination', ['pagination' => $pagination]) ?>
        </div>
        <?php
        if ($this->context->long_description !== '') {
            ?>
            <div class="box bottom25">
                <p class="lineheigh"><?= $this->context->long_description ?></p>
                <p><?= $this->render('//modules/like_share') ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
