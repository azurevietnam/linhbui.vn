<?php
/* @var $this View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use frontend\models\ArticleCategory;
use frontend\models\Menu;
use frontend\models\ProductCategory;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<?php require_once 'meta.php'; ?>
<?= Html::csrfMetaTags() ?> 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '935301939844245');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=935301939844245&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
<?php require_once 'header.php'; ?>
<div class="containers">
<div class="main">
<?= $content ?>
</div>
</div>
<script>
<?php $this->beginBlock('JS_END') ?>
//////////////
paragraphStyle();
window.addEventListener("resize", function(){
    paragraphStyle();
});
function paragraphStyle() {
    var g;
    var gs = document.getElementsByClassName("paragraph-2016-04");
    for (var k = 0; k < gs.length; k++) {
        g = gs[k];
        if (typeof(g) !== "undefined" && g !== null) {
            var g_w = parseInt(window.getComputedStyle(g, null).getPropertyValue("width"));
            var els = g.querySelectorAll("table, img, iframe");
            for (var i = 0; i < els.length; i++) {
                setStyle(els[i]);
            }
            function setStyle(el) {
                el.style.maxWidth = "initial";
                el.style.maxHeight = "initial";
                el.style.minWidth = "initial";
                el.style.minHeight = "initial";
                el_w = parseInt(window.getComputedStyle(el, null).getPropertyValue("width"));
                if (el_w > g_w) {
                    el.style.paddingRight = "0px";
                    el.style.paddingLeft = "0px";
                    el.style.boxSizing = "border-box";
                    el.style.height = "auto";
                    el.style.width = g_w + "px";
                }
            }
        }
    }
}
<?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['JS_END'], $this::POS_END, 'JS_END'); ?>
<?php require_once 'footer.php'; ?>
<?php require_once 'plugins.php'; ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
