<?php

use yii\helpers\Url;

$game = $this->context->game;
$app = $this->context->app;
$news = $this->context->news;
?>
<div class="footer">
    <div class="link_fooder clearfix">
        <div class="main">
            <ul class="list fl clearfix">
                <li class="clearfix"><a href="<?= Url::home(true) ?>" title="<?= Yii::$app->name ?>">Trang chủ </a></li>
                <li class="clearfix"><?= $game->a([], 'Game') ?></li>
                <li class="clearfix"><?= $app->a([], 'App') ?></li>
                <li class="last clearfix"><?= $news->a([], 'Tin') ?></li>
            </ul>
        </div>
    </div>
    <div class="fooder_wrap clearfix">
        <div class="main">
            <div class="bgblue clearfix">
                <div class="copyright fl">
                    <p itemprop="legalName"><strong>Copyright © 2015 VNGAME.me</strong></p>
                </div>
                <div class="social fr clearfix">
                    <p class="magb10 fl"><span>Theo dõi chúng tôi trên:</span></p>
                    <a href="https://www.facebook.com/xe5.vn" rel="nofollow" target="_blank" class="ic_face">Facebook</a>
                    <a href="https://twitter.com/gameonlineXE5" rel="nofollow" target="_blank" class="ic_twitter">twitter</a>
                    <a href="https://www.youtube.com/channel/UCZmD9utQzMBr8PsLebyQ6Sw" rel="nofollow" target="_blank" class="ic_youtube">youtube</a>
                    <a href="https://plus.google.com/103920349676267546914" rel="nofollow" target="_blank" class="ic_gg">g+</a> 
                </div>
            </div>
        </div>
    </div>
</div>