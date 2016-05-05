<?php

use yii\helpers\Url;

?>
<?php
if ($this->context->h1 != '') {
?>
<section class="topseo">
    <div class="main"><h1><strong><?= $this->context->h1 ?></strong></h1></div>
</section>
<?php
}
?>
<header>
    <div class="main clearfix">
        <div class="txt-logo fl"><a href="<?= Url::home(true) ?>" title="<?= Yii::$app->name ?>"><img src="<?= Url::home(true) ?>images/logo.png" title="<?= Yii::$app->name ?>" alt="<?= Yii::$app->name ?>"></a></div>
        <div class="box-adv" style="width:70%">
            <?= $this->render('//modules/adsense') ?>
        </div>
    </div>
</header>
<nav>
    <div class="main clearfix">
        <button class="navbar-toggle collapsed" type="button" onClick="showmenu('list-cate')"> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </button>
        <span class="sr-only">Menu danh mục</span>
        <ul class="list-unstyle clearfix" id="list-cate">
            <?php
            foreach (frontend\models\Menu::getTopParents() as $item) {
                ?>
            <?php
                if (count($item->getChildren()) == 0) {
            ?>
            <li class="fl<?= $item->isCurrent() ? ' active' : '' ?>"><?= $item->a([], "<strong>$item->label</strong>") ?><span class="line">|</span></li>
            <?php
                } else {
            ?>
            <li class="fl<?= $item->isCurrent() ? ' active' : '' ?>">
              <a href="javascript:void(0)" title="<?= $item->label ?>" onclick="showmenu('<?= $item->key ?>')"><strong><?= $item->label ?></strong></a><span class="line">|</span>
              <ul style="display:none" id="<?= $item->key ?>" class="list-unstyle clearfix">
                  <?php
                  foreach ($item->getChildren() as $c_item) {
                  ?>
                <li class="fl"><?= $c_item->a([], "<strong>$c_item->label</strong>") ?></li>
                <?php
                  }
                ?>
              </ul>
            </li>
            <?php
                }
            ?>
            <?php
            }
            ?>
        </ul>
        <div class="search"><em class="ic-search" onClick="showmenu('form-search')"></em> </div>
        <div class="form-search" id="form-search">
            <gcse:search></gcse:search>
        </div>
    </div>
</nav>
<section class="mid-header">
    <div class="main clearfix">
        <?php
        if (in_array(Yii::$app->controller->id, ['site'])) {
        ?>
            <strong>Hôm nay, ngày <?= date('d/m/Y H:i') ?></strong>
            <?php // echo $this->render('//modules/like-share', ['options' => ['class' => 'fr box-social']]) ?>
        <?php
        } else {
        ?>
            <?= $this->render('//modules/breadcrumbs') ?>
        <?php
        }
        ?>
    </div>
</section>
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