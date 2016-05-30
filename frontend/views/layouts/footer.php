<?php

use frontend\models\Article;
use frontend\models\SiteParam;

?>
<footer>
    <div class="wrap">
        <div class="col-4">
            <div class="dim-logo">
            </div>
            <div class="clearfix"></div>
            <div class="info">
                <p><i>Add:</i> <?= SiteParam::findOneByName(SiteParam::PARAM_ADDRESS)->value ?></p>
                <p><i>Phone:</i> <?= SiteParam::findOneByName(SiteParam::PARAM_PHONE_NUMBER)->value ?></p>
                <p><i>Email:</i> <?= SiteParam::findOneByName(SiteParam::PARAM_EMAIL)->value ?></p>
            </div>
        </div>
        <div class="col-4">
            <div class="info">
                <p class="title">Chăm sóc khách hàng</p>
                <?php
                $item = Article::findOneByType(Article::TYPE_ABOUT_US);
                if ($item->id != null) {
                ?>
                <p>&gt; <?= $item->a() ?></p>
                <?php
                }
                ?>
                <?php
                $item = Article::findOneByType(Article::TYPE_CONTACT_US);
                if ($item->id != null) {
                ?>
                <p>&gt; <?= $item->a() ?></p>
                <?php
                }
                ?>
                <?php
                $item = Article::findOneByType(Article::TYPE_PRICING);
                if ($item->id != null) {
                ?>
                <p>&gt; <?= $item->a() ?></p>
                <?php
                }
                ?>
                <?php
                $item = Article::findOneByType(Article::TYPE_FAQ);
                if ($item->id != null) {
                ?>
                <p>&gt; <?= $item->a() ?></p>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-4">
            <div class="info">
                <p class="title">Theo dõi chúng tôi trên</p>
            </div>
        </div>
    </div>
</footer>