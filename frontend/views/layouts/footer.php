<?php

use frontend\models\Adsense;
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
$ads = Adsense::findOneByType(Adsense::TYPE_BOTTOM_OVERLAY);
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
.bottom-overlay-adsense a {
    display: block;
}
.bottom-overlay-adsense img {
    display: block;
    margin: 0 auto;
}
.bottom-overlay-adsense .remove-icon {
    position: absolute;
    right: 2px;
    top: 2px;
    background-color: #fff;
    border-radius: 100px;
    cursor: pointer;
     filter: sepia(30%) saturate(5);
     -webkit-filter: sepia(30%) saturate(5);
}
</style>
<div class="bottom-overlay-adsense container paragraph">
    <div class="wrap">
        <a href="<?= $ads->link ?>" title="<?= $ads->caption ?>">
            <img src="<?= $ads->getImage() ?>" title="<?= $ads->caption ?>">
        </a>
        <span class="icon remove-icon" onclick="this.parentElement.style.display='none';"></span>
    </div>
</div>
<?php
}
?>
<script>
window.onscroll = function() {
    var e = document.getElementsByClassName("bottom-overlay-adsense")[0];
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        e.style.display = "none";
    } else {
        e.style.display = "block";
    }
};
</script>