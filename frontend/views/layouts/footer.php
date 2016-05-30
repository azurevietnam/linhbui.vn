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
                $items = Article::find()
                        ->where(['in', 'type', [
                            Article::TYPE_ABOUT_US,
                            Article::TYPE_CONTACT_US,
                            Article::TYPE_PRICING,
                            Article::TYPE_POLICY,
                            Article::TYPE_FAQ
                        ]])
                        ->orderBy('position asc, published_at desc')
                        ->allPublished();
                foreach ($items as $item) {
                    echo "<p>&gt; {$item->a()}</p>";
                }
                ?>
            </div>
        </div>
        <div class="col-4">
            <div class="info">
                <p class="title">Theo dõi chúng tôi trên</p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>