<?php
$game = $this->context->game;
$app = $this->context->app;
$news = $this->context->news;
?>
<?php
if ($this->context->h1 != '') {
?>
<div class="keytop">
    <div class="main">
        <h1><strong><?= $this->context->h1 ?></strong></h1>
    </div>
</div>
<?php
}
?>
<div class="header header_mega clearfix">
    <div class="top clearfix">
        <div class="main">
            <div class="fl clearfix">
                <div class="fl"><a href="<?= \yii\helpers\Url::home(true) ?>" title="<?= Yii::$app->name ?>" class="logo"></a></div>
                <ul class="platform_tabs">
                    <li class="clearfix" <?= $this->context->is_mobile ? 'onclick="shownav1()"' : 'onmouseover="d_shownav1()"' ?>><a title="<?= $game->label ?>" href="<?= $this->context->is_mobile ? 'javascript:void(0)' : $game->url ?>" <?= $game->isCurrent() ? 'class=active' : '' ?>><span class="fa fa-gamepad"></span> <span class="txt_menu">Game</span></a></li>
                    <li class="clearfix" <?= $this->context->is_mobile ? 'onclick="shownav()"' : 'onmouseover="d_shownav()"' ?>><a title="<?= $app->label ?>" href="<?= $this->context->is_mobile ? 'javascript:void(0)' : $app->url ?>" <?= $app->isCurrent() ? 'class=active' : '' ?>><span class="fa fa-adn"></span> <span class="txt_menu">App</span></a></li>
                    <li class="clearfix"><a title="<?= $news->label ?>" href="<?= $news->url ?>" <?= $news->isCurrent() ? 'class=active' : '' ?>><span class="fa fa-newspaper-o"></span> <span class="txt_menu">Tin</span></a></li>
                </ul>
            </div>
            <div class="fr search_r">
                <div class="search relative clearfix">
                    <div class="search-gg" id="search-gg">
                        <gcse:search></gcse:search>
                    </div>
                    <a class="ic_search" href="#" onclick="showmenuc2('search-gg')"></a>
                </div>
            </div>
            <div class="clearfix" id="categories-list" <?= $this->context->is_mobile ? '' : 'onmouseover="d_shownav()" onmouseout="d_hidenav1()"' ?>>
                <div class="sub-nav clearfix">
                    <ul class="clearfix">
                        <?php
                        foreach ($app->getChildren() as $item) {
                        ?><li><?= $item->a() ?></li>
                        <?php
                        }
                    ?></ul>
                </div>
            </div>
            <div class="clearfix" id="categories" <?= $this->context->is_mobile ? '' : 'onmouseover="d_shownav1()" onmouseout="d_hidenav()"' ?>>
                <div class="sub-nav clearfix">
                    <ul class="clearfix">
                        <?php
                        foreach ($game->getChildren() as $item) {
                        ?><li><?= $item->a() ?></li>
                        <?php
                        }
                    ?></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (!$this->context->is_mobile || $this->context->is_tablet) {
$this->registerCss('
    .form-search,#___gcse_0{max-width:280px}
    .gsc-input-box,.gsc-search-box,.gsc-control-cse,#___gcse_0,.form-search{border-radius:12px;}
    .gsc-search-box-tools .gsc-search-box .gsc-input{border-radius:12px}   
');
}
$this->registerCss('
.gsib_a{padding:0px!important}
.gsib_b{display:none}
.search.relative.clearfix{/*margin-top:0px*/;z-index:100}
.gsc-input-box{border:none!important;height:26px!important}
.gsc-search-box-tools .gsc-search-box .gsc-input{font-size:1.1em;/*background:none!important;*/padding:1px!important;height:26px!important}   
.cse .gsc-control-cse,.gsc-control-cse{padding:0!important}
form.gsc-search-box,table.gsc-search-box{margin-bottom:0}
.gsc-search-button,.gsc-search-button-v2{display:none}
.form-search,#___gcse_0{color:#999;width:calc(100vw);float:right}
.gsc-control-cse{border:1px solid #eee !important;height:30px;}
/*Search Result*/
.gsc-selected-option-container{min-width:100px;width:100px!important}
.gsc-orderby-container{display:none}
.gsc-results-wrapper-overlay{padding:0!important;height:96%!important;width:96%!important;top:2%!important;left:2%!important}
');
?>