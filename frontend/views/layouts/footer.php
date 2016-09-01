<?php

use frontend\models\Article;
use frontend\models\SiteParam;
$this->registerCss('.info .item .right-white-arrow, .info .item a{vertical-align:middle}');
?>
<footer class="container">
    <div class="wrap">
        <div class="col-5">
            <div class="inv-logo">
            </div>
            <div class="clearfix"></div>
            <div class="info">
                <table>
                    <tbody>
                        <tr>
                            <td><i class="icon icon-place"></i></td>
                            <td>&nbsp;</td>
                            <td><?= SiteParam::findOneByName(SiteParam::PARAM_ADDRESS)->value ?></td>
                        </tr>
                        <tr>
                            <td><i class="icon icon-phone"></i></td>
                            <td>&nbsp;</td>
                            <td><?= SiteParam::findOneByName(SiteParam::PARAM_PHONE_NUMBER)->value ?></td>
                        </tr>
                        <tr>
                            <td><i class="icon icon-email"></i></td>
                            <td>&nbsp;</td>
                            <td><?= SiteParam::findOneByName(SiteParam::PARAM_EMAIL)->value ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3">
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
                    echo "<p class=\"item\"><i class=\"right-white-arrow\"></i> {$item->a()}</p>";
                }
                ?>
            </div>
        </div>
        <div class="col-4">
            <div class="info dsk-fr">
                <p class="title">Theo dõi chúng tôi trên</p>
                <p>
                    <a href="<?= SiteParam::findOneByName(SiteParam::PARAM_FACEBOOK)->value ?>" title="Facebook" target="_blank">
                        <i class="icon icon-facebook"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="<?= SiteParam::findOneByName(SiteParam::PARAM_GOOGLE_PLUS)->value ?>" title="Google Plus" target="_blank">
                        <i class="icon icon-google-plus"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="<?= SiteParam::findOneByName(SiteParam::PARAM_TWITTER)->value ?>" title="Twitter" target="_blank">
                        <i class="twitter-icon"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="<?= SiteParam::findOneByName(SiteParam::PARAM_INSTAGRAM)->value ?>" title="Instagram" target="_blank">
                        <i class="icon icon-instagram"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<?php
$ads = frontend\models\Adsense::findOneByType(frontend\models\Adsense::TYPE_BOTTOM_OVERLAY);
if ($ads !== null) {
?>
<style>
.bottom-overlay-adsense {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 99999;
    display: block;
    width: 100%;
}
.bottom-overlay-adsense img {
    display: block;
    margin: 0 auto;
}
</style>
<a href="<?= $ads->link ?>" title="<?= $ads->caption ?>" class="bottom-overlay-adsense paragraph">
    <img src="<?= $ads->getImage() ?>" title="<?= $ads->caption ?>">
</a>
<?php
}
?>